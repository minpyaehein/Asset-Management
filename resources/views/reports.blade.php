<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Reports &amp; Analytics · Stockwise</title>
    <link href="assets/style.css" rel="stylesheet" />
    <script>
        (function() {
            const q = new URLSearchParams(location.search);
            if (q.get('embed') === '1') {
                document.documentElement.classList.add('embed-mode');
                const r = q.get('role');
                if (r === 'Admin' || r === 'Agent') {
                    sessionStorage.setItem('stockwiseRole', r);
                    if (!sessionStorage.getItem('stockwiseName')) sessionStorage.setItem('stockwiseName', r ===
                        'Admin' ? 'System Administrator' : 'Inventory Agent');
                }
            }
        })();
    </script>
    <style>
        html.embed-mode body {
            margin: 0 !important
        }

        html.embed-mode .sidebar {
            display: none !important
        }

        html.embed-mode .main {
            margin-left: 0 !important;
            min-width: 0 !important
        }

        html.embed-mode .layout {
            min-height: 100vh !important
        }

        html.embed-mode .content {
            max-width: none !important
        }

        html.embed-mode .topbar {
            position: sticky;
            top: 0
        }
    </style>
</head>

<body data-agent-edit="no" data-page="reports">
    <div class="layout">
        <aside class="sidebar"><a class="brand" href="dashboard.html"><span
                    class="brand-mark">S</span><span>stockwise<small>ASSET MANAGEMENT</small></span></a>
            <nav>
                <div class="nav-group">
                    <div class="nav-caption">Overview</div>
                    <div class="nav-list"><a class="admin-dashboard-only nav-link" data-nav="dashboard"
                            href="dashboard.html"><span class="nav-icon">▦</span>Admin Dashboard</a><a
                            class="agent-dashboard-only nav-link" data-nav="user-dashboard"
                            href="user-dashboard.html"><span class="nav-icon">⌂</span>Agent Dashboard</a></div>
                </div>
                <div class="nav-group">
                    <div class="nav-caption">Inventory</div>
                    <div class="nav-list"><a class="nav-link" data-nav="assets" href="assets.html"><span
                                class="nav-icon">▣</span>Assets &amp; Hardware</a><a class="nav-link"
                            data-nav="bulk-asset-import" href="bulk-asset-import.html"><span
                                class="nav-icon">⇧</span>Bulk Asset Import</a><a class="nav-link" data-nav="employees"
                            href="employees.html"><span class="nav-icon">♙</span>Employees</a><a class="nav-link"
                            data-nav="checkin-checkout" href="checkin-checkout.html"><span
                                class="nav-icon">⇄</span>Check-in / Check-out</a></div>
                </div>
                <div class="nav-group">
                    <div class="nav-caption">Software</div>
                    <div class="nav-list"><a class="nav-link" data-nav="software-management"
                            href="software-management.html#licenses"><span class="nav-icon">▤</span>Software &amp;
                            Warranty</a></div>
                </div>
                <div class="nav-group">
                    <div class="nav-caption">Operations</div>
                    <div class="nav-list"><a class="nav-link" data-nav="service-desk" href="service-desk.html"><span
                                class="nav-icon">◉</span>Service Desk</a><a class="nav-link" data-nav="asset-transfer"
                            href="asset-transfer.html"><span class="nav-icon">⇆</span>Asset Transfer</a><a
                            class="nav-link" data-nav="acknowledgement" href="acknowledgement.html"><span
                                class="nav-icon">✓</span>Acknowledgement</a><a class="nav-link"
                            data-nav="asset-disposal" href="asset-disposal.html"><span class="nav-icon">⌫</span>Asset
                            Disposal</a></div>
                </div>
                <div class="nav-group">
                    <div class="nav-caption">Maintenance</div>
                    <div class="nav-list"><a class="nav-link" data-nav="maintenance-center"
                            href="maintenance-center.html#planner"><span class="nav-icon">↻</span>Maintenance Center</a>
                    </div>
                </div>
                <div class="nav-group">
                    <div class="nav-caption">Insights</div>
                    <div class="nav-list"><a class="nav-link active" data-nav="reports" href="reports.html"><span
                                class="nav-icon">▥</span>Reports &amp; Analytics</a><a class="nav-link"
                            data-nav="notifications" href="notifications.html"><span
                                class="nav-icon">♢</span>Notifications</a><a class="nav-link" data-nav="audit-logs"
                            href="audit-logs.html"><span class="nav-icon">☷</span>Audit Logs</a></div>
                </div>
                <div class="nav-group">
                    <div class="nav-caption">Administration</div>
                    <div class="nav-list"><a class="nav-link admin-only" data-nav="user-management"
                            href="user-management.html"><span class="nav-icon">♙</span>User Management</a><a
                            class="nav-link admin-only" data-nav="role-management" href="role-management.html"><span
                                class="nav-icon">⚿</span>Role Management</a></div>
                </div>
            </nav>
            <div class="side-bottom">Inventory workspace<br />HTML + CSS · Inline JavaScript</div>
        </aside>
        <main class="main">
            <header class="topbar">
                <div class="crumb">Workspace  /  Reports &amp; Analytics</div>
                <div class="topbar-right">
                    <div class="search-wrap"><input aria-label="Search this table" id="global-search"
                            placeholder="Search this table…" type="search" /></div>
                    <div class="filter-wrap"><label for="record-filter">Filter</label><select
                            aria-label="Filter records" id="record-filter">
                            <option value="">All records</option>
                        </select></div>
                    <div class="user-chip">
                        <div class="avatar" id="user-avatar">A</div>
                        <div><strong id="user-name">Admin</strong><small id="user-role">Administrator</small></div>
                    </div><button class="btn" id="logout">Log out</button>
                </div>
            </header>
            <section class="content">
                <div class="page-head">
                    <div>
                        <div class="eyebrow">Insights</div>
                        <h1>Reports &amp; Analytics</h1>
                        <p>Quick inventory summary, software renewals and operational workload.</p>
                    </div>
                    <div class="button-row"><a class="btn" href="assets.html">Inventory List</a><button
                            class="btn primary" onclick="window.print()">Print Report</button></div>
                </div>
                <div class="stats">
                    <div class="stat">
                        <div class="stat-top">Total Assets<span class="stat-icon">▣</span></div>
                        <div class="stat-value">06</div>
                        <div class="stat-foot">Sample records</div>
                    </div>
                    <div class="stat">
                        <div class="stat-top">Available<span class="stat-icon">✓</span></div>
                        <div class="stat-value">03</div>
                        <div class="stat-foot">Ready to allocate</div>
                    </div>
                    <div class="stat">
                        <div class="stat-top">Assigned<span class="stat-icon">♙</span></div>
                        <div class="stat-value">02</div>
                        <div class="stat-foot">Employee possession</div>
                    </div>
                    <div class="stat">
                        <div class="stat-top">Maintenance<span class="stat-icon">⚙</span></div>
                        <div class="stat-value">01</div>
                        <div class="stat-foot">Needs attention</div>
                    </div>
                </div>
                <div class="split">
                    <div class="panel">
                        <div class="panel-head">
                            <div>
                                <h2>Inventory by Category</h2>
                                <p>Example distribution</p>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div style="margin:14px 0">
                                <div
                                    style="display:flex;justify-content:space-between;margin-bottom:7px;font-size:12px">
                                    <span>Laptop</span><strong>2</strong></div>
                                <div style="height:8px;background:#edf0f6;border-radius:9px;overflow:hidden">
                                    <div
                                        style="height:100%;width:33.33333333333333%;background:#3868e8;border-radius:9px">
                                    </div>
                                </div>
                            </div>
                            <div style="margin:14px 0">
                                <div
                                    style="display:flex;justify-content:space-between;margin-bottom:7px;font-size:12px">
                                    <span>Monitor</span><strong>1</strong></div>
                                <div style="height:8px;background:#edf0f6;border-radius:9px;overflow:hidden">
                                    <div
                                        style="height:100%;width:16.666666666666664%;background:#3868e8;border-radius:9px">
                                    </div>
                                </div>
                            </div>
                            <div style="margin:14px 0">
                                <div
                                    style="display:flex;justify-content:space-between;margin-bottom:7px;font-size:12px">
                                    <span>Printer</span><strong>1</strong></div>
                                <div style="height:8px;background:#edf0f6;border-radius:9px;overflow:hidden">
                                    <div
                                        style="height:100%;width:16.666666666666664%;background:#3868e8;border-radius:9px">
                                    </div>
                                </div>
                            </div>
                            <div style="margin:14px 0">
                                <div
                                    style="display:flex;justify-content:space-between;margin-bottom:7px;font-size:12px">
                                    <span>Network Device</span><strong>1</strong></div>
                                <div style="height:8px;background:#edf0f6;border-radius:9px;overflow:hidden">
                                    <div
                                        style="height:100%;width:16.666666666666664%;background:#3868e8;border-radius:9px">
                                    </div>
                                </div>
                            </div>
                            <div style="margin:14px 0">
                                <div
                                    style="display:flex;justify-content:space-between;margin-bottom:7px;font-size:12px">
                                    <span>Accessory</span><strong>1</strong></div>
                                <div style="height:8px;background:#edf0f6;border-radius:9px;overflow:hidden">
                                    <div
                                        style="height:100%;width:16.666666666666664%;background:#3868e8;border-radius:9px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-head">
                            <div>
                                <h2>Upcoming Renewal</h2>
                                <p>Sample operational reminder</p>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="notice"><strong>Adobe Creative Cloud</strong><br />Expiry:
                                2026-11-01<br />Owner: Aung Min<br />Status: Renewal Due</div><a class="btn"
                                href="software-management.html#licenses">Manage Expiry Records</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script>
        (function() {
            const role = sessionStorage.getItem('stockwiseRole'),
                page = document.body.dataset.page;
            if (!role) {
                location.href = 'login.html';
                return;
            }
            if (role === 'Agent' && ['user-management', 'role-management'].includes(page)) {
                location.href = 'user-dashboard.html';
                return;
            }
            const name = sessionStorage.getItem('stockwiseName') || role;
            document.getElementById('user-name').textContent = name;
            document.getElementById('user-role').textContent = role;
            document.getElementById('user-avatar').textContent = name[0].toUpperCase();
            document.querySelectorAll('.admin-only').forEach(el => el.hidden = role !== 'Admin');
            document.querySelectorAll('[data-nav="dashboard"]').forEach(el => el.hidden = role !== 'Admin');
            document.querySelectorAll('[data-nav="user-dashboard"]').forEach(el => el.hidden = role !== 'Agent');
            document.getElementById('logout').onclick = () => {
                sessionStorage.clear();
                location.href = 'login.html';
            };
            const table = document.getElementById('records'),
                form = document.getElementById('recordForm');
            if (role === 'Agent' && document.body.dataset.agentEdit !== 'yes' && form) form.closest('#add-panel')
                .hidden = true;
            if (!table || !form) return;
            const body = table.tBodies[0],
                fields = [...form.querySelectorAll('[data-field]')],
                key = 'stockwise_' + page;
            const search = document.getElementById('global-search'),
                filter = document.getElementById('record-filter'),
                count = document.getElementById('record-count'),
                panel = document.getElementById('add-panel');
            const filterIndex = Math.max(0, fields.findIndex(f =>
                /status|type|category|condition|role|priority|state|level|method/i.test(f.dataset.label || f
                    .name || '')));
            let rows = JSON.parse(localStorage.getItem(key) || 'null');
            if (!Array.isArray(rows)) rows = [...body.rows].map(r => [...r.cells].slice(0, fields.length).map(c => c
                .textContent.trim()));

            function render() {
                body.replaceChildren();
                rows.forEach((row, i) => {
                    if (search.value && !row.join(' ').toLowerCase().includes(search.value.toLowerCase()))
                        return;
                    if (filter && filter.value && String(row[filterIndex] || '') !== filter.value) return;
                    const tr = body.insertRow();
                    tr.dataset.index = i;
                    row.forEach(value => {
                        tr.insertCell().textContent = value;
                    });
                    const cell = tr.insertCell();
                    if (role === 'Admin' || document.body.dataset.agentEdit === 'yes') cell.insertAdjacentHTML(
                        'beforeend', '<button class="mini-btn" data-action="edit">Edit</button> ');
                    if (role === 'Admin') cell.insertAdjacentHTML('beforeend',
                        '<button class="mini-btn delete" data-action="delete">Delete</button>');
                });
                localStorage.setItem(key, JSON.stringify(rows));
                count.textContent = rows.length + ' records';
            }
            form.onsubmit = e => {
                e.preventDefault();
                const values = fields.map(f => f.value.trim()),
                    i = Number(form.elements._index.value);
                if (i >= 0) rows[i] = values;
                else rows.unshift(values);
                form.reset();
                form.elements._index.value = '-1';
                form.querySelector('[type=submit]').textContent = 'Save Record';
                panel.open = false;
                render();
            };
            table.onclick = e => {
                const btn = e.target.closest('[data-action]');
                if (!btn) return;
                const i = Number(btn.closest('tr').dataset.index);
                if (btn.dataset.action === 'delete') {
                    if (confirm('Delete this record?')) {
                        rows.splice(i, 1);
                        render();
                    }
                    return;
                }
                form.elements._index.value = i;
                fields.forEach((f, n) => f.value = rows[i][n] || '');
                form.querySelector('[type=submit]').textContent = 'Update Record';
                panel.open = true;
                panel.scrollIntoView({
                    behavior: 'smooth'
                });
            };
            search.oninput = render;
            if (filter) {
                const values = [...new Set(rows.map(r => String(r[filterIndex] || '').trim()).filter(Boolean))].sort();
                values.forEach(v => {
                    const o = document.createElement('option');
                    o.value = v;
                    o.textContent = v;
                    filter.appendChild(o);
                });
                filter.onchange = render;
            }
            document.getElementById('export-csv').onclick = () => {
                const csv = [fields.map(f => f.dataset.label).join(','), ...rows.map(r => r.map(v => '"' + v
                        .replace(/"/g, '""') + '"').join(','))].join('\n'),
                    a = document.createElement('a');
                a.href = URL.createObjectURL(new Blob([csv], {
                    type: 'text/csv'
                }));
                a.download = page + '.csv';
                a.click();
                URL.revokeObjectURL(a.href);
            };
            render();
        })();
    </script>
    <script>
        (function() {
            var f = document.getElementById('record-filter');
            if (!f) return;
            var items = [].slice.call(document.querySelectorAll(
                '.stat-card,.metric-card,.report-card,.panel,.dashboard-card'));
            f.innerHTML =
                '<option value="">All sections</option><option value="inventory">Inventory</option><option value="software">Software</option><option value="maintenance">Maintenance</option><option value="activity">Activity</option>';
            f.onchange = function() {
                items.forEach(function(el) {
                    el.hidden = !!f.value && el.textContent.toLowerCase().indexOf(f.value) < 0;
                });
            };
        })();
    </script>
    <script>
        (function() {
            function syncNav() {
                const role = sessionStorage.getItem('stockwiseRole');
                document.querySelectorAll('.admin-dashboard-only').forEach(el => el.hidden = role !== 'Admin');
                document.querySelectorAll('.agent-dashboard-only').forEach(el => el.hidden = role !== 'Agent');
            }
            syncNav();
            if (window.__stockwiseSpaInstalled) return;
            window.__stockwiseSpaInstalled = true;
            async function loadPage(href, push) {
                const target = new URL(href, location.href);
                if (target.pathname === location.pathname && target.hash) {
                    if (push) history.pushState({
                        stockwise: true
                    }, '', target.href);
                    const tab = decodeURIComponent(target.hash.slice(1));
                    const button = document.querySelector('[data-tab="' + CSS.escape(tab) + '"]');
                    if (button) {
                        button.click();
                        return;
                    }
                    return;
                }
                try {
                    const res = await fetch(target.href);
                    if (!res.ok) throw new Error('Page could not be loaded');
                    const doc = new DOMParser().parseFromString(await res.text(), 'text/html');
                    if (!doc.querySelector('.main')) throw new Error('Invalid page');
                    if (push) history.pushState({
                        stockwise: true
                    }, '', target.href);
                    document.title = doc.title;
                    [...document.body.attributes].forEach(a => document.body.removeAttribute(a.name));
                    [...doc.body.attributes].forEach(a => document.body.setAttribute(a.name, a.value));
                    document.body.innerHTML = doc.body.innerHTML;
                    document.querySelectorAll('script').forEach(old => {
                        const n = document.createElement('script');
                        if (old.src) n.src = old.src;
                        else n.textContent = old.textContent;
                        old.replaceWith(n)
                    });
                    syncNav();
                    const hash = target.hash.slice(1);
                    if (hash) {
                        const tab = document.querySelector('[data-tab="' + CSS.escape(hash) + '"]');
                        if (tab) tab.click();
                    }
                    window.scrollTo(0, 0);
                } catch (e) {
                    location.assign(target.href)
                }
            }
            document.addEventListener('click', e => {
                const a = e.target.closest('a[href]');
                if (!a || a.target || e.defaultPrevented || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey)
                    return;
                const u = new URL(a.href, location.href);
                if (u.origin !== location.origin || !u.pathname.toLowerCase().endsWith('.html') || (u
                        .pathname === location.pathname && u.hash === location.hash)) return;
                e.preventDefault();
                loadPage(u.href, true)
            });
            window.addEventListener('popstate', () => loadPage(location.href, false));
        })();
    </script>
    <script>
        (function() {
            if (window === window.top) return;
            document.addEventListener('click', function(e) {
                if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
                const logout = e.target.closest('#logout');
                if (logout) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    parent.postMessage({
                        type: 'stockwise-logout'
                    }, '*');
                    return;
                }
                const a = e.target.closest('a[href]');
                if (!a || a.target || e.defaultPrevented) return;
                let u;
                try {
                    u = new URL(a.href, location.href)
                } catch (_) {
                    return;
                }
                if (!u.pathname.toLowerCase().endsWith('.html') || u.pathname === location.pathname) return;
                e.preventDefault();
                e.stopImmediatePropagation();
                parent.postMessage({
                    type: 'stockwise-navigate',
                    href: u.href
                }, '*');
            }, true);
        })();
    </script>
</body>

</html>
