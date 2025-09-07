<!-- Language Switcher -->
<p align="center">
  <a href="#english">English</a> ·
  <a href="#中文">中文</a>
</p>

<h1 id="english">AgentScope: Agent-Oriented Programming for LLM Applications</h1>

<p align="center">
  <a href="https://github.com/agentscope-ai/agentscope/blob/main/README.md"><b>English Homepage</b></a> •
  <a href="https://doc.agentscope.io/zh_CN/"><b>Tutorial</b></a> •
  <a href="https://github.com/agentscope-ai/agentscope/blob/main/docs/roadmap.md"><b>Roadmap</b></a> •
  <a href="https://doc.agentscope.io/zh_CN/tutorial/faq.html"><b>FAQ</b></a>
</p>

<p align="center">
  <img src="https://img.alicdn.com/imgextra/i1/O1CN01nTg6w21NqT5qFKH1u_!!6000000001621-55-tps-550-550.svg" alt="AgentScope Logo" width="200" />
</p>

<p align="center">
  <a href="https://arxiv.org/abs/2402.14034">
    <img src="https://img.shields.io/badge/cs.MA-2402.14034-B31C1C?logo=arxiv&logoColor=B31C1C" alt="arxiv"/>
  </a>
  <a href="https://pypi.org/project/agentscope/">
    <img src="https://img.shields.io/badge/python-3.10+-blue?logo=python" alt="python"/>
  </a>
  <a href="https://pypi.org/project/agentscope/">
    <img src="https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fpypi.org%2Fpypi%2Fagentscope%2Fjson&query=%24.info.version&prefix=v&logo=pypi&label=version" alt="version"/>
  </a>
  <a href="https://doc.agentscope.io/">
    <img src="https://img.shields.io/badge/Docs-English%7C%E4%B8%AD%E6%96%87-blue?logo=markdown" alt="docs"/>
  </a>
  <a href="https://agentscope.io/">
    <img src="https://img.shields.io/badge/GUI-AgentScope_Studio-blue?logo=look&logoColor=green&color=dark-green" alt="studio"/>
  </a>
  <a href="./LICENSE">
    <img src="https://img.shields.io/badge/license-Apache--2.0-black" alt="license"/>
  </a>
</p>

<details open>
<summary><b>Why AgentScope?</b></summary>

- **Developer-transparent:** No hidden magic. Prompts, API calls, agent graphs, and workflows are explicit.
- **Real-time steering:** Native interrupts + custom handlers.
- **Smarter primitives:** Tool management, long-term memory control, intelligent RAG.
- **Model-agnostic:** One codepath, many providers.
- **LEGO-style composition:** Modular, loosely coupled components.
- **Multi-agent first:** Explicit message passing & orchestration.
- **Highly customizable:** Tools, prompts, agents, workflows, third-party libs, and visualization.

**v1.0 Feature Map**

| Module | Highlights | Docs |
|---|---|---|
| model | Async; streaming/non-streaming; tool APIs | [Model](https://doc.agentscope.io/zh_CN/tutorial/task_model.html) |
| tool | Async/sync tools; streaming outputs; interrupts; post-processing; grouped tools; meta-tool mgmt | [Tool](https://doc.agentscope.io/zh_CN/tutorial/task_tool.html) |
| MCP | Streamable HTTP/SSE/StdIO; stateful/stateless clients; fine-grained controls | [MCP](https://doc.agentscope.io/zh_CN/tutorial/task_mcp.html) |
| agent | Async exec; parallel tools; real-time steering; auto state; LTM control; hooks |  |
| tracing | OpenTelemetry for LLMs/tools/agents/formatters; Arize-Phoenix/Langfuse | [Tracing](https://doc.agentscope.io/zh_CN/tutorial/task_tracing.html) |
| memory | Long-term memory | [Memory](https://doc.agentscope.io/zh_CN/tutorial/task_long_term_memory.html) |
| session | App/session state | [Session](https://doc.agentscope.io/zh_CN/tutorial/task_state.html) |
| evaluation | Distributed/parallel eval | [Evaluation](https://doc.agentscope.io/zh_CN/tutorial/task_eval.html) |
| formatter | Multi-agent prompt formatting; truncation strategies | [Prompt](https://doc.agentscope.io/zh_CN/tutorial/task_prompt.html) |

</details>

## 📢 News
- **2025-09:** **AgentScope Runtime** open-sourced (sandboxed tool execution & production deployment).
- **2025-09:** **AgentScope Studio** open-s