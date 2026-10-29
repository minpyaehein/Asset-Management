<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>Stockwise Inventory Workspace</title>
        <link rel="stylesheet" href="assets/style.css" />
        <style>
            html,
            body {
                margin: 0;
                min-height: 100%;
                overflow: hidden;
            }
            .app-shell {
                display: grid;
                grid-template-columns: 252px minmax(0, 1fr);
                height: 100vh;
                min-height: 0;
                background: var(--paper);
            }
            .app-shell > .sidebar {
                position: relative;
                inset: auto;
                width: auto;
                height: 100vh;
                min-height: 0;
                z-index: 20;
            }
            .app-main {
                min-width: 0;
                min-height: 0;
                height: 100vh;
                overflow: hidden;
            }
            .app-frame {
                display: block;
                width: 100%;
                height: 100%;
                border: 0;
                background: var(--paper);
            }
            .nav-loading {
                position: absolute;
                right: 18px;
                bottom: 12px;
                color: #8a94a8;
                font-size: 10px;
                pointer-events: none;
            }
            .app-shell .nav-group[hidden],
            .app-shell .nav-link[hidden] {
                display: none !important;
            }
            @media (max-width: 760px) {
                html,
                body {
                    overflow: auto;
                }
                .app-shell {
                    display: flex;
                    flex-direction: column;
                    height: 100dvh;
                    min-height: 0;
                }
                .app-shell > .sidebar {
                    position: relative;
                    height: auto;
                    max-height: 42vh;
                    overflow: auto;
                }
                .app-main {
                    height: 58dvh;
                    min-height: 400px;
                }
                .app-frame {
                    height: 100%;
                }
            }
        </style>
    </head>
    <body>
        <div class="app-shell">
            <aside class="sidebar">
                <a
                    class="brand"
                    href="?view=dashboard.html"
                    data-view="dashboard.html"
                    ><span class="brand-mark">S</span
                    ><span>stockwise<small>ASSET MANAGEMENT</small></span></a
                >
                <nav>
                    <div class="nav-group">
                        <div class="nav-caption">Overview</div>
                        <div class="nav-list">
                            <a
                                class="nav-link admin-dashboard-only"
                                data-view="dashboard.html"
                                href="?view=dashboard.html"
                                ><span class="nav-icon">▦</span>Admin
                                Dashboard</a
                            ><a
                                class="nav-link agent-dashboard-only"
                                data-view="user-dashboard.html"
                                href="?view=user-dashboard.html"
                                ><span class="nav-icon">⌂</span>Agent
                                Dashboard</a
                            >
                        </div>
                    </div>
                    <div class="nav-group">
                        <div class="nav-caption">Inventory</div>
                        <div class="nav-list">
                            <a
                                class="nav-link"
                                data-view="assets.html"
                                href="?view=assets.html"
                                ><span class="nav-icon">▣</span>Assets &amp;
                                Hardware</a
                            ><a
                                class="nav-link"
                                data-view="bulk-asset-import.html"
                                href="?view=bulk-asset-import.html"
                                ><span class="nav-icon">⇧</span>Bulk Asset
                                Import</a
                            ><a
                                class="nav-link"
                                data-view="employees.html"
                                href="?view=employees.html"
                                ><span class="nav-icon">♙</span>Employees</a
                            ><a
                                class="nav-link"
                                data-view="checkin-checkout.html"
                                href="?view=checkin-checkout.html"
                                ><span class="nav-icon">⇄</span>Check-in /
                                Check-out</a
                            >
                        </div>
                    </div>
                    <div class="nav-group">
                        <div class="nav-caption">Software</div>
                        <div class="nav-list">
                            <a
                                class="nav-link"
                                data-view="software-management.html"
                                data-tab="licenses"
                                href="?view=software-management.html&amp;tab=licenses"
                                ><span class="nav-icon">▤</span>Software &amp;
                                Warranty</a
                            >
                        </div>
                    </div>
                    <div class="nav-group">
                        <div class="nav-caption">Operations</div>
                        <div class="nav-list">
                            <a
                                class="nav-link"
                                data-view="service-desk.html"
                                href="?view=service-desk.html"
                                ><span class="nav-icon">◉</span>Service Desk</a
                            ><a
                                class="nav-link"
                                data-view="asset-transfer.html"
                                href="?view=asset-transfer.html"
                                ><span class="nav-icon">⇆</span>Asset
                                Transfer</a
                            ><a
                                class="nav-link"
                                data-view="acknowledgement.html"
                                href="?view=acknowledgement.html"
                                ><span class="nav-icon">✓</span
                                >Acknowledgement</a
                            ><a
                                class="nav-link"
                                data-view="asset-disposal.html"
                                href="?view=asset-disposal.html"
                                ><span class="nav-icon">⌫</span>Asset
                                Disposal</a
                            >
                        </div>
                    </div>
                    <div class="nav-group">
                        <div class="nav-caption">Maintenance</div>
                        <div class="nav-list">
                            <a
                                class="nav-link"
                                data-view="maintenance-center.html"
                                data-tab="planner"
                                href="?view=maintenance-center.html&amp;tab=planner"
                                ><span class="nav-icon">↻</span>Maintenance
                                Center</a
                            >
                        </div>
                    </div>
                    <div class="nav-group">
                        <div class="nav-caption">Insights</div>
                        <div class="nav-list">
                            <a
                                class="nav-link"
                                data-view="reports.html"
                                href="?view=reports.html"
                                ><span class="nav-icon">▥</span>Reports &amp;
                                Analytics</a
                            ><a
                                class="nav-link"
                                data-view="notifications.html"
                                href="?view=notifications.html"
                                ><span class="nav-icon">♢</span>Notifications</a
                            ><a
                                class="nav-link"
                                data-view="audit-logs.html"
                                href="?view=audit-logs.html"
                                ><span class="nav-icon">☷</span>Audit Logs</a
                            >
                        </div>
                    </div>
                    <div class="nav-group admin-nav-group">
                        <div class="nav-caption">Administration</div>
                        <div class="nav-list">
                            <a
                                class="nav-link admin-only"
                                data-view="user-management.html"
                                href="?view=user-management.html"
                                ><span class="nav-icon">♙</span>User
                                Management</a
                            ><a
                                class="nav-link admin-only"
                                data-view="role-management.html"
                                href="?view=role-management.html"
                                ><span class="nav-icon">⚿</span>Role
                                Management</a
                            >
                        </div>
                    </div>
                </nav>
                <div class="side-bottom">
                    Inventory workspace<br />HTML + CSS · Inline JavaScript
                </div>
            </aside>
            <main class="app-main">
                <iframe
                    class="app-frame"
                    id="page-frame"
                    title="Stockwise page"
                    loading="eager"
                ></iframe
                ><span
                    class="nav-loading"
                    id="frame-status"
                    aria-live="polite"
                ></span>
            </main>
        </div>
        <script>
            (function () {
                const allowed = new Set([
                    "dashboard.html",
                    "user-dashboard.html",
                    "assets.html",
                    "bulk-asset-import.html",
                    "employees.html",
                    "checkin-checkout.html",
                    "software-management.html",
                    "service-desk.html",
                    "asset-transfer.html",
                    "acknowledgement.html",
                    "asset-disposal.html",
                    "maintenance-center.html",
                    "reports.html",
                    "notifications.html",
                    "audit-logs.html",
                    "user-management.html",
                    "role-management.html",
                ]);
                const role = sessionStorage.getItem("stockwiseRole");
                if (!role) {
                    location.replace("login.html");
                    return;
                }
                const name = sessionStorage.getItem("stockwiseName") || role;
                const frame = document.getElementById("page-frame");
                let currentView = "",
                    currentTab = "";
                const adminOnly = new Set([
                    "user-management.html",
                    "role-management.html",
                ]);
                function syncRole() {
                    document
                        .querySelectorAll(".admin-dashboard-only")
                        .forEach((a) => (a.hidden = role !== "Admin"));
                    document
                        .querySelectorAll(".agent-dashboard-only")
                        .forEach((a) => (a.hidden = role !== "Agent"));
                    document
                        .querySelectorAll(".admin-only")
                        .forEach((a) => (a.hidden = role !== "Admin"));
                    document
                        .querySelectorAll(".admin-nav-group")
                        .forEach((g) => (g.hidden = role !== "Admin"));
                }
                function normalise(view, tab) {
                    if (!allowed.has(view))
                        view =
                            role === "Admin"
                                ? "dashboard.html"
                                : "user-dashboard.html";
                    if (
                        role === "Agent" &&
                        (view === "dashboard.html" || adminOnly.has(view))
                    )
                        view = "user-dashboard.html";
                    if (role === "Admin" && view === "user-dashboard.html")
                        view = "dashboard.html";
                    return { view, tab: tab || "" };
                }
                function route(view, tab, push) {
                    const v = normalise(view, tab);
                    view = v.view;
                    tab = v.tab;
                    if (view === currentView && tab === currentTab) {
                        setActive();
                        return;
                    }
                    currentView = view;
                    currentTab = tab;
                    setActive();
                    if (push) {
                        const q = new URLSearchParams({ view });
                        if (tab) q.set("tab", tab);
                        history.pushState(
                            { view, tab },
                            "",
                            location.pathname + "?" + q.toString(),
                        );
                    }
                    const r = encodeURIComponent(role);
                    frame.src =
                        view +
                        "?embed=1&role=" +
                        r +
                        (tab ? "#" + encodeURIComponent(tab) : "");
                    document.getElementById("frame-status").textContent = "";
                }
                function setActive() {
                    document
                        .querySelectorAll("[data-view]")
                        .forEach((a) =>
                            a.classList.toggle(
                                "active",
                                a.dataset.view === currentView,
                            ),
                        );
                }
                function readLocation(push) {
                    const q = new URLSearchParams(location.search);
                    let view =
                        q.get("view") ||
                        (role === "Admin"
                            ? "dashboard.html"
                            : "user-dashboard.html");
                    route(view, q.get("tab") || "", false);
                }
                document
                    .querySelector(".app-shell")
                    .addEventListener("click", (e) => {
                        const a = e.target.closest("a[data-view]");
                        if (
                            !a ||
                            e.metaKey ||
                            e.ctrlKey ||
                            e.shiftKey ||
                            e.altKey
                        )
                            return;
                        e.preventDefault();
                        route(a.dataset.view, a.dataset.tab || "", true);
                    });
                window.addEventListener("message", (e) => {
                    const d = e.data || {};
                    if (
                        d.type === "stockwise-navigate" &&
                        typeof d.href === "string"
                    ) {
                        let u;
                        try {
                            u = new URL(d.href, location.href);
                        } catch (_) {
                            return;
                        }
                        const view = u.pathname.split("/").pop();
                        if (allowed.has(view)) {
                            const tab = u.hash
                                ? decodeURIComponent(u.hash.slice(1))
                                : "";
                            route(view, tab, true);
                        }
                    } else if (d.type === "stockwise-logout") {
                        sessionStorage.clear();
                        location.replace("login.html");
                    }
                });
                window.addEventListener("popstate", readLocation);
                frame.addEventListener("load", () => {
                    setActive();
                    document.getElementById("frame-status").textContent = "";
                });
                syncRole();
                readLocation(false);
            })();
        </script>
    </body>
</html>
