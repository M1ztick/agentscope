#!/usr/bin/env python3
"""Simple FastAPI wrapper around the OpenAI ReAct example agent for demos.

Endpoints:
- GET /demo -> simple chat HTML demo
- POST /chat -> JSON {"text": "..."} returns {"reply": "..."}
"""
from __future__ import annotations

import os
import asyncio
from typing import Optional

from fastapi import FastAPI, Request
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
from dotenv import load_dotenv

from agentscope.agent import ReActAgent, UserAgent
from agentscope.model import OpenAIChatModel
from agentscope.formatter import OpenAIChatFormatter
from agentscope.memory import InMemoryMemory
from agentscope.tool import Toolkit, execute_python_code, execute_shell_command

load_dotenv()

app = FastAPI()
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)


class ChatRequest(BaseModel):
    text: str


@app.on_event("startup")
async def startup_event() -> None:
    """Initialize the agent once on app startup and attach to app.state."""
    # Create toolkit and register basic tools
    toolkit = Toolkit()
    toolkit.register_tool_function(execute_python_code)
    toolkit.register_tool_function(execute_shell_command)

    # Initialize the OpenAI model
    model = OpenAIChatModel(
        model_name=os.getenv("OPENAI_MODEL", "gpt-4"),
        api_key=os.getenv("OPENAI_API_KEY"),
        stream=False,
        generate_kwargs={"temperature": 0.2, "max_tokens": 800},
    )

    agent = ReActAgent(
        name="Insertabot",
        sys_prompt=(
            "You are a helpful assistant embedded on a website. Answer concisely and clearly."
        ),
        model=model,
        formatter=OpenAIChatFormatter(),
        toolkit=toolkit,
        memory=InMemoryMemory(),
        enable_meta_tool=False,
        parallel_tool_calls=False,
    )

    user = UserAgent(name="WebUser")

    # store in app state for handlers
    app.state.agent = agent
    app.state.user = user


@app.get("/demo")
async def demo_page(request: Request):
    """Return a small demo HTML page (embedded chat UI)."""
    base = os.path.dirname(__file__)
    html_path = os.path.join(base, "static", "chat.html")
    try:
        with open(html_path, "r", encoding="utf-8") as fh:
            return fh.read()
    except Exception:
        return "<html><body><h1>Demo not found</h1></body></html>"


@app.post("/chat")
async def chat(req: ChatRequest):
    """Accept a chat text and return the agent reply as JSON."""
    agent: ReActAgent = app.state.agent
    user: UserAgent = app.state.user

    # create a user message and send to agent
    msg = await user.reply(req.text)
    resp = await agent(msg)
    text = resp.get_text_content() if resp is not None else ""
    return {"reply": text}


@app.get("/health")
async def health():
    return {"status": "ok"}


if __name__ == "__main__":
    import uvicorn

    # run uvicorn on 0.0.0.0:8000
    uvicorn.run("server:app", host="0.0.0.0", port=8000, reload=False)
