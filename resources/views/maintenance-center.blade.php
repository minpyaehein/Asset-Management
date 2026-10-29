<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Maintenance Center · Stockwise</title>
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

<body data-agent-edit="yes" data-page="maintenance-center">
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
                    <div class="nav-list"><a class="nav-link active" data-nav="maintenance-center"
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
                <div class="crumb">Workspace / Maintenance Center</div>
                <div class="topbar-right">
                    <div class="search-wrap"><input aria-label="Search this table" id="global-search"
                            placeholder="Search this table…" type="search" /></div>
                    <div class="user-chip">
                        <div class="avatar" id="user-avatar">A</div>
                        <div><strong id="user-name">Admin</strong><small id="user-role">Administrator</small></div>
                    </div><button class="btn" id="logout">Log out</button>
                </div>
            </header>
            <section class="content">
                <div class="page-head">
                    <div>
                        <div class="eyebrow">Maintenance workspace</div>
                        <h1>Maintenance Center</h1>
                        <p>Plan upcoming work and review maintenance history in one place.</p>
                    </div>
                    <div class="button-row"><button class="btn" id="export-active" type="button">⇩ Export
                            Current Tab</button></div>
                </div>
                <div class="tab-bar" role="tablist"><button class="tab-button active" data-tab="planner"
                        type="button">Maintenance Planner</button><button class="tab-button" data-tab="history"
                        type="button">Maintenance History</button></div>
                <section class="module-section"
                    data-cols='[{"label": "Plan ID", "index": 0}, {"label": "Asset Tag", "index": 1}, {"label": "Maintenance Type", "index": 2}, {"label": "Scheduled Date", "index": 3}, {"label": "Technician", "index": 4}, {"label": "Status", "index": 5}, {"label": "Notes", "index": 6}]'
                    data-key="stockwise_maintenance-center_planner" data-legacy-key="stockwise_maintenance-planner"
                    data-module="planner"
                    data-seed='[["PLN-0001", "AST-1005", "Inspection", "2026-10-30", "Aung Min", "Scheduled", "Quarterly switch check"]]'
                    id="section-planner">
                    <div class="section-intro">
                        <div>
                            <h2>Maintenance Planner</h2>
                            <p>Schedule preventive work, inspections and repairs.</p>
                        </div>
                    </div>
                    <details class="panel form-panel" id="add-panel-planner">
                        <summary>Add New Maintenance Plan</summary>
                        <div class="form-body">
                            <form id="form-planner"><input name="_index" type="hidden" value="-1" />
                                <div class="form-grid">
                                    <div class="field"><label for="field_plan_id">Plan ID</label><input
                                            data-field="" data-label="Plan ID" id="field_plan_id"
                                            name="field_plan_id" placeholder="PLN-0002" required=""
                                            type="text" value="" /></div>
                                    <div class="field"><label for="field_asset_tag">Asset Tag</label><select
                                            data-field="" data-label="Asset Tag" id="field_asset_tag"
                                            name="field_asset_tag" required="">
                                            <option value="AST-1001">AST-1001</option>
                                            <option value="AST-1002">AST-1002</option>
                                            <option value="AST-1003">AST-1003</option>
                                        </select></div>
                                    <div class="field"><label for="field_maintenance_type">Maintenance
                                            Type</label><select data-field="" data-label="Maintenance Type"
                                            id="field_maintenance_type" name="field_maintenance_type" required="">
                                            <option value="Preventive">Preventive</option>
                                            <option value="Inspection">Inspection</option>
                                            <option value="Repair">Repair</option>
                                            <option value="Upgrade">Upgrade</option>
                                        </select></div>
                                    <div class="field"><label for="field_scheduled_date">Scheduled Date</label><input
                                            data-field="" data-label="Scheduled Date" id="field_scheduled_date"
                                            name="field_scheduled_date" placeholder="" required="" type="date"
                                            value="" /></div>
                                    <div class="field"><label for="field_technician">Technician</label><input
                                            data-field="" data-label="Technician" id="field_technician"
                                            name="field_technician" placeholder="Technician name" type="text"
                                            value="" /></div>
                                    <div class="field"><label for="field_status">Status</label><select
                                            data-field="" data-label="Status" id="field_status" name="field_status"
                                            required="">
                                            <option value="Scheduled">Scheduled</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select></div>
                                    <div class="field"><label for="field_notes">Notes</label>
                                        <textarea data-field="" data-label="Notes" id="field_notes" name="field_notes" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-footer"><button class="btn" data-clear=""
                                        type="reset">Clear</button><button class="btn primary" type="submit">Save
                                        Record</button></div>
                            </form>
                        </div>
                    </details>
                    <div class="panel">
                        <div class="panel-head">
                            <div>
                                <h2>Maintenance Planner Records</h2>
                                <p>Search, filter and update records. Changes are saved in this browser.</p>
                            </div><span class="count" id="count-planner">1 records</span>
                        </div>
                        <div class="record-tools">
                            <div class="filter-wrap"><label for="filter-planner">Filter</label><select
                                    class="record-filter" id="filter-planner">
                                    <option value="">All records</option>
                                </select></div>
                            <div class="button-row"><button class="btn" id="export-planner" type="button">⇩
                                    Export CSV</button></div>
                        </div>
                        <div class="table-wrap">
                            <table id="table-planner">
                                <thead>
                                    <tr>
                                        <th>Plan ID</th>
                                        <th>Asset Tag</th>
                                        <th>Maintenance Type</th>
                                        <th>Scheduled Date</th>
                                        <th>Technician</th>
                                        <th>Status</th>
                                        <th>Notes</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PLN-0001</td>
                                        <td>AST-1005</td>
                                        <td>Inspection</td>
                                        <td>2026-10-30</td>
                                        <td>Aung Min</td>
                                        <td>Scheduled</td>
                                        <td>Quarterly switch check</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <section class="module-section"
                    data-cols='[{"label": "Record ID", "index": 0}, {"label": "Asset Tag", "index": 1}, {"label": "Maintenance Type", "index": 2}, {"label": "Date", "index": 3}, {"label": "Technician", "index": 4}, {"label": "Cost", "index": 5}, {"label": "Outcome", "index": 6}]'
                    data-key="stockwise_maintenance-center_history" data-legacy-key="stockwise_maintenance-history"
                    data-module="history"
                    data-seed='[["MNT-0001", "AST-1004", "Repair", "2026-10-18", "Aung Min", "45", "Paper feed repaired"]]'
                    hidden="" id="section-history">
                    <div class="section-intro">
                        <div>
                            <h2>Maintenance History</h2>
                            <p>Review completed maintenance and service outcomes.</p>
                        </div>
                    </div>
                    <details class="panel form-panel" id="add-panel-history">
                        <summary>Add New Maintenance Record</summary>
                        <div class="form-body">
                            <form id="form-history"><input name="_index" type="hidden" value="-1" />
                                <div class="form-grid">
                                    <div class="field"><label for="field_record_id">Record ID</label><input
                                            data-field="" data-label="Record ID" id="field_record_id"
                                            name="field_record_id" placeholder="MNT-0002" required=""
                                            type="text" value="" /></div>
                                    <div class="field"><label for="field_asset_tag">Asset Tag</label><select
                                            data-field="" data-label="Asset Tag" id="field_asset_tag"
                                            name="field_asset_tag" required="">
                                            <option value="AST-1001">AST-1001</option>
                                            <option value="AST-1002">AST-1002</option>
                                            <option value="AST-1003">AST-1003</option>
                                            <option value="AST-1004">AST-1004</option>
                                            <option value="AST-1005">AST-1005</option>
                                        </select></div>
                                    <div class="field"><label for="field_maintenance_type">Maintenance
                                            Type</label><select data-field="" data-label="Maintenance Type"
                                            id="field_maintenance_type" name="field_maintenance_type" required="">
                                            <option value="Repair">Repair</option>
                                            <option value="Preventive">Preventive</option>
                                            <option value="Inspection">Inspection</option>
                                            <option value="Upgrade">Upgrade</option>
                                        </select></div>
                                    <div class="field"><label for="field_date">Date</label><input data-field=""
                                            data-label="Date" id="field_date" name="field_date" placeholder=""
                                            required="" type="date" value="" /></div>
                                    <div class="field"><label for="field_technician">Technician</label><input
                                            data-field="" data-label="Technician" id="field_technician"
                                            name="field_technician" placeholder="Technician name" type="text"
                                            value="" /></div>
                                    <div class="field"><label for="field_cost">Cost</label><input data-field=""
                                            data-label="Cost" id="field_cost" name="field_cost" placeholder="0.00"
                                            type="number" value="" /></div>
                                    <div class="field"><label for="field_outcome">Outcome</label>
                                        <textarea data-field="" data-label="Outcome" id="field_outcome" name="field_outcome"
                                            placeholder="Work performed and outcome"></textarea>
                                    </div>
                                </div>
                                <div class="form-footer"><button class="btn" data-clear=""
                                        type="reset">Clear</button><button class="btn primary" type="submit">Save
                                        Record</button></div>
                            </form>
                        </div>
                    </details>
                    <div class="panel">
                        <div class="panel-head">
                            <div>
                                <h2>Maintenance History Records</h2>
                                <p>Search, filter and update records. Changes are saved in this browser.</p>
                            </div><span class="count" id="count-history">1 records</span>
                        </div>
                        <div class="record-tools">
                            <div class="filter-wrap"><label for="filter-history">Filter</label><select
                                    class="record-filter" id="filter-history">
                                    <option value="">All records</option>
                                </select></div>
                            <div class="button-row"><button class="btn" id="export-history" type="button">⇩
                                    Export CSV</button></div>
                        </div>
                        <div class="table-wrap">
                            <table id="table-history">
                                <thead>
                                    <tr>
                                        <th>Record ID</th>
                                        <th>Asset Tag</th>
                                        <th>Maintenance Type</th>
                                        <th>Date</th>
                                        <th>Technician</th>
                                        <th>Cost</th>
                                        <th>Outcome</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>MNT-0001</td>
                                        <td>AST-1004</td>
                                        <td>Repair</td>
                                        <td>2026-10-18</td>
                                        <td>Aung Min</td>
                                        <td>45</td>
                                        <td>Paper feed repaired</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </section>
        </main>
    </div>
    <script>
        (function() {
            const role = sessionStorage.getItem('stockwiseRole');
            if (!role) {
                location.href = 'login.html';
                return;
            }
            const name = sessionStorage.getItem('stockwiseName') || role;
            document.getElementById('user-name').textContent = name;
            document.getElementById('user-role').textContent = role;
            document.getElementById('user-avatar').textContent = name[0].toUpperCase();
            document.querySelectorAll('.admin-only').forEach(el => el.hidden = role !== 'Admin');
            document.querySelectorAll('.admin-dashboard-only').forEach(el => el.hidden = role !== 'Admin');
            document.querySelectorAll('.agent-dashboard-only').forEach(el => el.hidden = role !== 'Agent');
            document.getElementById('logout').onclick = () => {
                sessionStorage.clear();
                location.href = 'login.html';
            };
            const esc = s => String(s ?? '').replace(/[&<>"']/g, c => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;'
            } [c]));
            const mods = {};
            document.querySelectorAll('[data-module]').forEach(sec => {
                const id = sec.dataset.module,
                    form = sec.querySelector('form'),
                    table = sec.querySelector('table'),
                    fields = [...form.querySelectorAll('[data-field]')],
                    body = table.tBodies[0],
                    search = document.getElementById('global-search'),
                    filter = sec.querySelector('.record-filter'),
                    count = document.getElementById('count-' + id),
                    panel = sec.querySelector('details');
                let rows;
                try {
                    rows = JSON.parse(localStorage.getItem(sec.dataset.key) || localStorage.getItem(sec.dataset
                        .legacyKey) || sec.dataset.seed || '[]')
                } catch (_) {
                    rows = []
                }
                if (!Array.isArray(rows)) rows = [];
                const cols = JSON.parse(sec.dataset.cols || '[]');
                mods[id] = {
                    sec,
                    form,
                    table,
                    fields,
                    body,
                    search,
                    filter,
                    count,
                    panel,
                    rows,
                    cols,
                    key: sec.dataset.key
                };

                function refillOptions() {
                    const keep = filter.value;
                    filter.innerHTML = '<option value="">All records</option>';
                    let idx = fields.findIndex(f => /status|type|vendor|category/i.test(f.dataset.label || ''));
                    if (idx < 0) idx = 0;
                    const vals = [...new Set(rows.map(r => r[idx]).filter(Boolean))].sort();
                    vals.forEach(v => {
                        const o = document.createElement('option');
                        o.value = v;
                        o.textContent = v;
                        filter.appendChild(o)
                    });
                    if (vals.includes(keep)) filter.value = keep;
                }

                function getCell(row, col) {
                    if (col.calc === 'used') {
                        const installs = mods.installations?.rows || [];
                        return installs.filter(r => String(r[1]).startsWith(String(row[2]) + ' —') || r[2] ===
                            row[0]).length;
                    }
                    if (col.calc === 'expiryStatus') {
                        const d = new Date(row[col.index || 0]),
                            today = new Date();
                        return !row[col.index || 0] ? '—' : d < today ? 'Expired' : (d - today) / 86400000 <
                            30 ? 'Expiring Soon' : 'Active';
                    }
                    return row[col.index] ?? '';
                }

                function render() {
                    body.replaceChildren();
                    rows.forEach((row, i) => {
                        if (search.value && !row.join(' ').toLowerCase().includes(search.value
                                .toLowerCase())) return;
                        if (filter.value && !row.some(v => String(v) === filter.value)) return;
                        const tr = body.insertRow();
                        tr.dataset.index = i;
                        cols.forEach(c => {
                            const td = tr.insertCell();
                            const val = getCell(row, c);
                            if (c.label === 'Status') td.innerHTML =
                                '<span class="status-chip status-' + String(val).toLowerCase()
                                .replace(/[^a-z]+/g, '-') + '">' + esc(val || '—') + '</span>';
                            else td.textContent = val || '—';
                        });
                        const action = tr.insertCell();
                        action.innerHTML =
                            '<button class="mini-btn" data-action="edit">Edit</button> ' + (role ===
                                'Admin' ?
                                '<button class="mini-btn delete" data-action="delete">Delete</button>' :
                                '');
                    });
                    localStorage.setItem(sec.dataset.key, JSON.stringify(rows));
                    count.textContent = rows.length + ' records';
                    refillOptions();
                }
                form.onsubmit = e => {
                    e.preventDefault();
                    const vals = fields.map(f => f.value.trim()),
                        i = Number(form.elements._index.value);
                    if (i >= 0) rows[i] = vals;
                    else rows.unshift(vals);
                    form.reset();
                    form.elements._index.value = '-1';
                    form.querySelector('[type=submit]').textContent = form.dataset.saveLabel ||
                        'Save Record';
                    panel.open = false;
                    render();
                };
                form.onreset = () => setTimeout(() => {
                    form.elements._index.value = '-1';
                    const b = form.querySelector('[type=submit]');
                    if (b) b.textContent = form.dataset.saveLabel || 'Save Record';
                }, 0);
                table.onclick = e => {
                    const b = e.target.closest('[data-action]');
                    if (!b) return;
                    const i = Number(b.closest('tr').dataset.index);
                    if (b.dataset.action === 'delete') {
                        if (role === 'Admin' && confirm('Delete this record?')) {
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
                        behavior: 'smooth',
                        block: 'center'
                    });
                };
                search.oninput = () => Object.values(mods).forEach(m => m.render ? m.render() : null);
                filter.onchange = render;
                const exportBtn = document.getElementById('export-' + id);
                exportBtn.onclick = () => {
                    const csv = [fields.map(f => f.dataset.label).join(','), ...rows.map(r => r.map(v =>
                        '"' + String(v ?? '').replace(/"/g, '""') + '"').join(','))].join('\n');
                    const a = document.createElement('a');
                    a.href = URL.createObjectURL(new Blob([csv], {
                        type: 'text/csv'
                    }));
                    a.download = id + '.csv';
                    a.click();
                    URL.revokeObjectURL(a.href);
                };
                mods[id].render = render;
                render();
            });

            function activate(tab) {
                document.querySelectorAll('.tab-button').forEach(b => b.classList.toggle('active', b.dataset.tab ===
                    tab));
                document.querySelectorAll('.module-section').forEach(s => s.hidden = s.dataset.module !== tab);
                if (tab && location.hash !== '#' + tab) history.replaceState(null, '', location.pathname + '#' + tab);
                const active = document.getElementById('section-' + tab);
                if (active) {
                    const b = active.querySelector('.record-filter');
                    if (b) b.dispatchEvent(new Event('change'));
                }
            }
            Object.values(mods).forEach(m => m.render());
            document.querySelectorAll('.tab-button').forEach(b => b.addEventListener('click', () => activate(b.dataset
                .tab)));
            const initial = location.hash.slice(1),
                first = document.querySelector('.tab-button')?.dataset.tab;
            activate(document.querySelector('[data-tab="' + initial + '"]') ? initial : first);
            document.getElementById('export-active')?.addEventListener('click', () => {
                const active = document.querySelector('.module-section:not([hidden])');
                active?.querySelector('[id^="export-"]')?.click();
            });
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
