<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= esc($title??'POS') ?> · Point of Sale</title>
<style>
*{box-sizing:border-box}
:root{--ink:#172033;--muted:#718096;--canvas:#f7f8fc;--surface:#fff;--line:#e6e9f0;--accent:#ef6a5b;--accent-dark:#d9534f;--nav:#172033;--nav-muted:#aeb8c8;--success:#18805d}
body{margin:0;background:var(--canvas);color:var(--ink);font:15px/1.55 Inter,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif}
body:has(.shell){min-height:100vh}
a{color:inherit}
.shell{min-height:100vh;display:flex}
.sidebar{width:238px;background:var(--nav);color:#fff;padding:28px 16px 20px;display:flex;flex-direction:column;flex-shrink:0}
.brand{display:flex;align-items:center;gap:11px;text-decoration:none;font-size:18px;font-weight:800;letter-spacing:-.03em;padding:0 12px 30px}
.brand-mark{display:grid;place-items:center;width:34px;height:34px;border-radius:10px;background:var(--accent);color:#fff;font-size:17px;font-weight:900}
.nav-label{padding:0 12px 10px;color:#77849a;font-size:10px;letter-spacing:.14em;text-transform:uppercase;font-weight:800}
.side-nav{display:grid;gap:5px}.side-nav a{display:flex;align-items:center;gap:11px;color:var(--nav-muted);text-decoration:none;padding:11px 12px;border-radius:10px;font-weight:650}.side-nav a:hover,.side-nav a.active{background:#273149;color:#fff}.side-nav a.active{box-shadow:inset 3px 0 var(--accent)}
.nav-icon{width:20px;color:currentColor;opacity:.82;font-size:16px;text-align:center}.sidebar-spacer{flex:1}.side-footer{border-top:1px solid #2a344a;padding:17px 12px 0;color:var(--nav-muted);font-size:12px}.side-footer strong{display:block;color:#fff;font-size:13px;margin-bottom:2px}
.content-shell{min-width:0;flex:1}.topbar{height:76px;background:var(--surface);border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:flex-end;padding:0 42px;gap:16px}.user-chip{display:flex;align-items:center;gap:10px;color:var(--muted);font-size:13px}.avatar{display:grid;place-items:center;width:34px;height:34px;border-radius:50%;background:#fee5df;color:#b64a43;font-weight:800}.topbar .logout{color:var(--muted);text-decoration:none;font-size:13px;font-weight:700}.topbar .logout:hover{color:var(--accent-dark)}
.wrap{max-width:1240px;margin:0 auto;padding:42px 42px 60px}h1{margin:0;color:var(--ink);font-size:30px;line-height:1.15;letter-spacing:-.04em}h2{margin:0 0 16px;font-size:18px;letter-spacing:-.02em}.page-kicker{margin:0 0 8px;color:var(--accent-dark);font-size:11px;font-weight:850;letter-spacing:.12em;text-transform:uppercase}.page-heading{display:flex;justify-content:space-between;gap:20px;align-items:flex-end;margin-bottom:28px}.page-heading p{margin:8px 0 0}
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}.card,table,form{background:var(--surface);border:1px solid var(--line);border-radius:14px;padding:22px;box-shadow:0 8px 24px rgba(23,32,51,.045)}.stat{font-size:34px;line-height:1;font-weight:850;letter-spacing:-.06em;margin-top:14px;color:var(--ink)}.metric-card{position:relative;overflow:hidden}.metric-card:after{content:"";position:absolute;right:-18px;bottom:-25px;width:78px;height:78px;border-radius:50%;background:#fff0ec}.metric-card .muted{position:relative;z-index:1}
table{width:100%;border-collapse:separate;border-spacing:0;padding:0;overflow:hidden}th,td{padding:15px 18px;border-bottom:1px solid var(--line);text-align:left;white-space:nowrap}th{background:#fbfbfd;color:#7a8494;font-size:11px;letter-spacing:.08em;text-transform:uppercase;font-weight:800}tr:last-child td{border-bottom:0}tbody tr:hover td{background:#fffaf9}
input,select{width:100%;padding:12px 13px;margin:7px 0 17px;border:1px solid #d7dce6;background:#fcfcfe;color:var(--ink);border-radius:9px;box-sizing:border-box;font:inherit;outline:none}input:focus,select:focus{border-color:var(--accent);box-shadow:0 0 0 3px #ef6a5b22}label{display:block;color:#4a5568;font-size:13px;font-weight:700}
button,.btn{display:inline-flex;align-items:center;justify-content:center;background:var(--accent);color:white;border:0;border-radius:9px;padding:11px 16px;text-decoration:none;cursor:pointer;font:700 13px/1.2 inherit;transition:transform .15s ease,background .15s ease,box-shadow .15s ease}.btn:hover,button:hover{background:var(--accent-dark);transform:translateY(-1px);box-shadow:0 7px 14px #ef6a5b2b}.btn.secondary{background:#eef1f6;color:#4a5568}.btn.secondary:hover{background:#e3e7ef;box-shadow:none}.btn.danger{background:#fff0ee;color:#c74e48}.btn.danger:hover{background:#ffe0db;box-shadow:none}.actions{display:flex;gap:9px;align-items:center;flex-wrap:wrap}
.back{display:inline-flex;align-items:center;gap:6px;margin-bottom:18px;color:var(--muted);text-decoration:none;font-size:13px;font-weight:700}.back:hover{color:var(--accent-dark)}.flash{padding:13px 16px;border-radius:10px;margin-bottom:18px;background:#e5f7ef;color:var(--success);border:1px solid #c6ebda}.error{background:#fff0ee;color:#b4443d;border-color:#ffd7d1}.muted{color:var(--muted)}
.quick-card{margin-top:18px}.quick-card .actions{margin-top:4px}
.login-page{min-height:100vh;display:grid;place-items:center;background:#f7f8fc;padding:24px}.login{width:min(100%,430px);margin:0}.login-brand{text-align:center;margin-bottom:24px}.login-brand .brand-mark{margin:0 auto 14px}.login-brand h1{font-size:30px}.login-brand p{margin:8px 0 0}.login form{padding:28px}.login button{width:100%;padding:13px}.login-note{text-align:center;font-size:12px;margin:16px 0 0}.login .flash{margin-bottom:18px}
@media(max-width:850px){.sidebar{width:208px}.topbar{padding:0 24px}.wrap{padding:34px 24px 48px}}
@media(max-width:700px){.shell{display:block}.sidebar{width:100%;padding:16px}.brand{padding:0 4px 14px}.nav-label,.sidebar-spacer,.side-footer{display:none}.side-nav{display:flex;overflow:auto;padding-bottom:2px}.side-nav a{white-space:nowrap;padding:9px 11px}.topbar{height:58px;padding:0 16px}.wrap{padding:28px 16px 40px}.page-heading{align-items:flex-start;flex-direction:column;margin-bottom:22px}.grid{grid-template-columns:1fr}table{display:block;overflow-x:auto}.topbar .user-chip{margin-right:auto}}
</style>
</head>
<body>
<?php if(session('isLoggedIn')): ?>
<?php $path=trim(uri_string(),'/'); ?>
<div class="shell"><aside class="sidebar"><a class="brand" href="/dashboard"><span class="brand-mark">P</span><span>POS System</span></a><div class="nav-label">Workspace</div><nav class="side-nav"><a class="<?= $path==='' || $path==='dashboard' ? 'active' : '' ?>" href="/dashboard"><span class="nav-icon">⌂</span>Dashboard</a><a class="<?= str_starts_with($path,'products') ? 'active' : '' ?>" href="/products"><span class="nav-icon">▦</span>Products</a><a class="<?= str_starts_with($path,'customers') ? 'active' : '' ?>" href="/customers"><span class="nav-icon">◉</span>Customers</a><a class="<?= str_starts_with($path,'staff') ? 'active' : '' ?>" href="/staff"><span class="nav-icon">♙</span>Staff</a><a class="<?= str_starts_with($path,'sales') ? 'active' : '' ?>" href="/sales"><span class="nav-icon">↗</span>Sales</a></nav><div class="sidebar-spacer"></div><div class="side-footer"><strong>Operations console</strong><span>Staff access enabled</span></div></aside><div class="content-shell"><header class="topbar"><div class="user-chip"><span class="avatar"><?= esc(strtoupper(substr(session('full_name') ?: session('username'),0,1))) ?></span><span><?= esc(session('full_name') ?: session('username')) ?></span></div><a class="logout" href="/logout">Sign out</a></header>
<?php endif ?>
<main class="wrap">
<?php if($m=session()->getFlashdata('success')): ?><div class="flash"><?= esc($m) ?></div><?php endif ?>
<?php if($m=session()->getFlashdata('error')): ?><div class="flash error"><?= esc($m) ?></div><?php endif ?>
<?= $content ?>
</main>
<?php if(session('isLoggedIn')): ?></div></div><?php endif ?>
</body>
</html>
