<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Asset Transfer · Stockwise</title>
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

<body data-agent-edit="yes" data-page="asset-transfer">
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
                                class="nav-icon">◉</span>Service Desk</a><a class="nav-link active"
                            data-nav="asset-transfer" href="asset-transfer.html"><span class="nav-icon">⇆</span>Asset
                            Transfer</a><a class="nav-link" data-nav="acknowledgement" href="acknowledgement.html"><span
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
                    <div class="nav-list"><a class="nav-link" data-nav="reports" href="reports.html"><span
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
                <div class="crumb">Workspace  /  Asset Transfer</div>
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
                        <div class="eyebrow">Inventory workspace</div>
                        <h1>Asset Transfer</h1>
                        <p>Track movements between people, teams and locations.</p>
                    </div>
                    <div class="button-row"><button class="btn" id="export-csv" type="button">⇩ Export
                            CSV</button><button class="btn" onclick="window.print()" type="button">Print</button>
                    </div>
                </div>
                <details class="panel form-panel" id="add-panel">
                    <summary>Add New Asset Transfer</summary>
                    <div class="form-body">
                        <form id="recordForm"><input name="_index" type="hidden" value="-1" />
                            <div class="form-grid">
                                <div class="field"><label for="field_0">Transfer ID</label><input data-field=""
                                        data-label="Transfer ID" id="field_0" name="field_0"
                                        placeholder="TRF-0003" required="" type="text" /></div>
                                <div class="field"><label for="field_1">Asset Tag</label><input data-field=""
                                        data-label="Asset Tag" id="field_1" name="field_1" placeholder="AST-1001"
                                        type="text" /></div>
                                <div class="field"><label for="field_2">From Location</label><input data-field=""
                                        data-label="From Location" id="field_2" name="field_2"
                                        placeholder="Yangon · Floor 3" type="text" /></div>
                                <div class="field"><label for="field_3">To Location</label><input data-field=""
                                        data-label="To Location" id="field_3" name="field_3"
                                        placeholder="Yangon · Floor 2" type="text" /></div>
                                <div class="field"><label for="field_4">Requested By</label><input data-field=""
                                        data-label="Requested By" id="field_4" name="field_4"
                                        placeholder="Employee name" type="text" /></div>
                                <div class="field"><label for="field_5">Date</label><input data-field=""
                                        data-label="Date" id="field_5" name="field_5" placeholder="Date"
                                        type="date" /></div>
                                <div class="field"><label for="field_6">Status</label><select data-field=""
                                        data-label="Status" id="field_6" name="field_6" required="">
                                        <option value="Pending">Pending</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Rejected">Rejected</option>
                                    </select></div>
                            </div>
                            <div class="form-footer"><button class="btn" type="reset">Clear</button><button
                                    class="btn primary" type="submit">Save Record</button></div>
                        </form>
                    </div>
                </details>
                <div class="panel">
                    <div class="panel-head">
                        <div>
                            <h2>Asset Transfer Records</h2>
                            <p>Search, add and update records. Changes are saved in this browser.</p>
                        </div><span class="count" id="record-count">1 records</span>
                    </div>
                    <div class="record-tools"><span class="count">Use the search box in the top bar to filter
                            records.</span><span class="count">Saved in this browser</span></div>
                    <div class="table-wrap">
                        <table id="records">
                            <thead>
                                <tr>
                                    <th>Transfer ID</th>
                                    <th>Asset Tag</th>
                                    <th>From Location</th>
                                    <th>To Location</th>
                                    <th>Requested By</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>TRF-0001</td>
                                    <td>AST-1005</td>
                                    <td>Server Room</td>
                                    <td>Yangon · Floor 2</td>
                                    <td>Aung Min</td>
                                    <td>2026-10-22</td>
                                    <td>Pending</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body count">Tip: use Edit to load a row into the form. Delete is available to
                        Admin only.</div>
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
