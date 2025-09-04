<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Stockclem API</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9edf2;
        }

        .main-wrapper {
            display: flex;
            flex-grow: 1;
        }

        #sidebar {
            min-width: 280px;
            max-width: 280px;
            background-color: #2c3e50;
            color: #ecf0f1;
            transition: all 0.3s;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding-top: 20px;
        }

        #sidebar .nav-link {
            color: rgba(236, 240, 241, 0.8);
            padding: 0.9rem 1.5rem;
            font-size: 1rem;
            border-left: 5px solid transparent;
            transition: all 0.2s ease-in-out;
            display: flex;
            align-items: center;
        }
        
        #sidebar .nav-link i {
            font-size: 1.2rem;
            margin-right: 10px;
        }

        #sidebar .nav-link:hover {
            background-color: #34495e;
            color: #fff;
            border-left-color: #3498db;
        }

        #sidebar .nav-link.active {
            color: #fff;
            background-color: #3498db;
            border-left-color: #2980b9;
            font-weight: bold;
        }

        .content {
            flex-grow: 1;
            padding: 2.5rem;
            background-color: #f8f9fa;
        }
        
        .card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 1.5rem;
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background-color: #0d6efd;
            color: white;
            border-radius: 0.75rem 0.75rem 0 0;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
        }

        .card-header h3 {
             text-transform: capitalize;
             margin-bottom: 0;
             font-weight: 600;
             font-size: 1.75rem;
             display: flex;
             align-items: center;
        }

        .card-header h3 i {
            margin-right: 12px;
            font-size: 1.8rem;
        }

        .card-body {
            padding: 2rem;
        }

        .navbar-brand {
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 35px;
            margin-right: 10px;
        }
        
        pre {
            background-color: #eef3f7;
            padding: 1.2rem;
            border-radius: 0.5rem;
            border: 1px solid #dee2e6;
            font-size: 0.9rem;
            overflow-x: auto;
        }

        .endpoint-badge {
            margin-right: 8px;
            padding: 0.4em 0.7em;
            font-size: 0.85em;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.375rem;
            display: inline-flex;
            align-items: center;
        }

        .badge-get { background-color: #0d6efd; }
        .badge-post { background-color: #198754; }
        .badge-put { background-color: #fd7e14; }
        .badge-delete { background-color: #dc3545; }

        #welcome-dashboard {
            text-align: center;
            padding: 3rem 2rem;
            background-color: white;
            border-radius: 0.75rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/stockclem-logo.png') }}" alt="Logo stocklem" class="d-inline-block align-text-top">
                Stockclem API
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex ms-auto" role="search">
                    <input class="form-control me-2" type="search" id="apiSearch" placeholder="Buscar módulo..." aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="main-wrapper">
        <aside id="sidebar">
            <nav class="nav flex-column p-3">
                <p class="text-secondary small text-uppercase fw-bold mb-3">Módulos</p>
                
                <a class="nav-link active" data-bs-toggle="collapse" href="#welcome-content" role="button" aria-expanded="true" aria-controls="welcome-content">
                    <i class="bi bi-house-door-fill"></i> Dashboard
                </a>
                <a class="nav-link" data-bs-toggle="collapse" href="#auth-content" role="button" aria-expanded="false" aria-controls="auth-content">
                    <i class="bi bi-key-fill"></i> Autenticación
                </a>
                <a class="nav-link" data-bs-toggle="collapse" href="#article-content" role="button" aria-expanded="false" aria-controls="article-content">
                    <i class="bi bi-box-seam"></i> Artículos
                </a>
                <a class="nav-link" data-bs-toggle="collapse" href="#category-content" role="button" aria-expanded="false" aria-controls="category-content">
                    <i class="bi bi-tags"></i> Categorías
                </a>
                <a class="nav-link" data-bs-toggle="collapse" href="#issue-content" role="button" aria-expanded="false" aria-controls="issue-content">
                    <i class="bi bi-bug"></i> Incidencias
                </a>
                <a class="nav-link" data-bs-toggle="collapse" href="#unit-content" role="button" aria-expanded="false" aria-controls="unit-content">
                    <i class="bi bi-rulers"></i> Unidades
                </a>
                <a class="nav-link" data-bs-toggle="collapse" href="#user-content" role="button" aria-expanded="false" aria-controls="user-content">
                    <i class="bi bi-person-circle"></i> Usuarios
                </a>
                <a class="nav-link" data-bs-toggle="collapse" href="#entry-content" role="button" aria-expanded="false" aria-controls="entry-content">
                    <i class="bi bi-box-arrow-in-down"></i> Entradas
                </a>
                <a class="nav-link" data-bs-toggle="collapse" href="#presentation-content" role="button" aria-expanded="false" aria-controls="presentation-content">
                    <i class="bi bi-file-earmark-slides"></i> Presentaciones
                </a>
                 <a class="nav-link" data-bs-toggle="collapse" href="#person-content" role="button" aria-expanded="false" aria-controls="person-content">
                    <i class="bi bi-person-bounding-box"></i> Personas
                </a>
                <a class="nav-link" data-bs-toggle="collapse" href="#supplier-content" role="button" aria-expanded="false" aria-controls="supplier-content">
                    <i class="bi bi-truck"></i> Proveedores
                </a>
            </nav>
        </aside>

        <main class="content">
            <div id="content-container">

                <div class="collapse show" id="welcome-content" data-bs-parent="#content-container">
                    <div id="welcome-dashboard">
                        <i class="bi bi-rocket-takeoff-fill text-primary mb-4" style="font-size: 4rem;"></i>
                        <h2>Bienvenido a la Documentación de la API Stockclem</h2>
                        <p>Explora y comprende todos los endpoints disponibles. Utiliza el menú lateral para navegar por los diferentes módulos.</p>
                    </div>
                </div>

                <div class="collapse" id="auth-content" data-bs-parent="#content-container">
                    <div class="card module-card">
                        <div class="card-header"><h3><i class="bi bi-key-fill"></i> Autenticación</h3></div>
                        <div class="card-body">
                            <p class="card-text">Gestiona la autenticación de usuarios y la generación de tokens.</p>
                            <h5 class="mt-4">Endpoints:</h5>
                            <pre><code><span class="endpoint-badge badge-post">POST</span> /api/login
<span class="endpoint-badge badge-post">POST</span> /api/logout</code></pre>
                        </div>
                    </div>
                </div>
            
                <div class="collapse" id="article-content" data-bs-parent="#content-container">
                    <div class="card module-card">
                        <div class="card-header"><h3><i class="bi bi-box-seam"></i> Artículos</h3></div>
                        <div class="card-body">
                            <p class="card-text">Gestiona los productos del inventario.</p>
                            <h5 class="mt-4">Endpoints:</h5>
                            <pre><code><span class="endpoint-badge badge-get">GET</span>    /api/article
<span class="endpoint-badge badge-get">GET</span>    /api/article/{id}
<span class="endpoint-badge badge-post">POST</span>   /api/article
<span class="endpoint-badge badge-put">PUT</span>    /api/article/{id}
<span class="endpoint-badge badge-delete">DELETE</span> /api/article/{id}</code></pre>
                        </div>
                    </div>
                </div>

                <div class="collapse" id="category-content" data-bs-parent="#content-container">
                    <div class="card module-card">
                        <div class="card-header"><h3><i class="bi bi-tags"></i> Categorías</h3></div>
                        <div class="card-body">
                            <p class="card-text">Organización para clasificar artículos.</p>
                             <h5 class="mt-4">Endpoints:</h5>
                            <pre><code><span class="endpoint-badge badge-get">GET</span>    /api/category
<span class="endpoint-badge badge-get">GET</span>    /api/category/{id}
<span class="endpoint-badge badge-post">POST</span>   /api/category
<span class="endpoint-badge badge-put">PUT</span>    /api/category/{id}
<span class="endpoint-badge badge-delete">DELETE</span> /api/category/{id}</code></pre>
                        </div>
                    </div>
                </div>

                <div class="collapse" id="issue-content" data-bs-parent="#content-container">
                    <div class="card module-card"><div class="card-header"><h3><i class="bi bi-bug"></i> Incidencias</h3></div><div class="card-body"><p class="card-text">Administración y seguimiento de incidencias.</p><h5 class="mt-4">Endpoints:</h5><pre><code><span class="endpoint-badge badge-get">GET</span>    /api/issue
<span class="endpoint-badge badge-get">GET</span>    /api/issue/{id}
<span class="endpoint-badge badge-post">POST</span>   /api/issue
<span class="endpoint-badge badge-put">PUT</span>    /api/issue/{id}
<span class="endpoint-badge badge-delete">DELETE</span> /api/issue/{id}</code></pre></div></div>
                </div>
                <div class="collapse" id="unit-content" data-bs-parent="#content-container">
                    <div class="card module-card"><div class="card-header"><h3><i class="bi bi-rulers"></i> Unidades</h3></div><div class="card-body"><p class="card-text">Manejo de unidades de medida.</p><h5 class="mt-4">Endpoints:</h5><pre><code><span class="endpoint-badge badge-get">GET</span>    /api/unit
<span class="endpoint-badge badge-get">GET</span>    /api/unit/{id}
<span class="endpoint-badge badge-post">POST</span>   /api/unit
<span class="endpoint-badge badge-put">PUT</span>    /api/unit/{id}
<span class="endpoint-badge badge-delete">DELETE</span> /api/unit/{id}</code></pre></div></div>
                </div>
                <div class="collapse" id="user-content" data-bs-parent="#content-container">
                    <div class="card module-card"><div class="card-header"><h3><i class="bi bi-person-circle"></i> Usuarios</h3></div><div class="card-body"><p class="card-text">Gestión de usuarios del sistema.</p><h5 class="mt-4">Endpoints:</h5><pre><code><span class="endpoint-badge badge-get">GET</span>    /api/user
<span class="endpoint-badge badge-get">GET</span>    /api/user/{id}
<span class="endpoint-badge badge-post">POST</span>   /api/user
<span class="endpoint-badge badge-put">PUT</span>    /api/user/{id}
<span class="endpoint-badge badge-delete">DELETE</span> /api/user/{id}</code></pre></div></div>
                </div>
                <div class="collapse" id="entry-content" data-bs-parent="#content-container">
                    <div class="card module-card"><div class="card-header"><h3><i class="bi bi-box-arrow-in-down"></i> Entradas</h3></div><div class="card-body"><p class="card-text">Control de entradas de mercancías.</p><h5 class="mt-4">Endpoints:</h5><pre><code><span class="endpoint-badge badge-get">GET</span>    /api/entry
<span class="endpoint-badge badge-get">GET</span>    /api/entry/{id}
<span class="endpoint-badge badge-post">POST</span>   /api/entry
<span class="endpoint-badge badge-put">PUT</span>    /api/entry/{id}
<span class="endpoint-badge badge-delete">DELETE</span> /api/entry/{id}</code></pre></div></div>
                </div>
                <div class="collapse" id="presentation-content" data-bs-parent="#content-container">
                    <div class="card module-card"><div class="card-header"><h3><i class="bi bi-file-earmark-slides"></i> Presentaciones</h3></div><div class="card-body"><p class="card-text">Gestión de formatos y presentaciones.</p><h5 class="mt-4">Endpoints:</h5><pre><code><span class="endpoint-badge badge-get">GET</span>    /api/presentation
<span class="endpoint-badge badge-get">GET</span>    /api/presentation/{id}
<span class="endpoint-badge badge-post">POST</span>   /api/presentation
<span class="endpoint-badge badge-put">PUT</span>    /api/presentation/{id}
<span class="endpoint-badge badge-delete">DELETE</span> /api/presentation/{id}</code></pre></div></div>
                </div>
                <div class="collapse" id="person-content" data-bs-parent="#content-container">
                    <div class="card module-card"><div class="card-header"><h3><i class="bi bi-person-bounding-box"></i> Personas</h3></div><div class="card-body"><p class="card-text">Gestión de datos de personas.</p><h5 class="mt-4">Endpoints:</h5><pre><code><span class="endpoint-badge badge-get">GET</span>    /api/person
<span class="endpoint-badge badge-get">GET</span>    /api/person/{id}
<span class="endpoint-badge badge-post">POST</span>   /api/person
<span class="endpoint-badge badge-put">PUT</span>    /api/person/{id}
<span class="endpoint-badge badge-delete">DELETE</span> /api/person/{id}</code></pre></div></div>
                </div>
                <div class="collapse" id="supplier-content" data-bs-parent="#content-container">
                    <div class="card module-card"><div class="card-header"><h3><i class="bi bi-truck"></i> Proveedores</h3></div><div class="card-body"><p class="card-text">Administración de proveedores.</p><h5 class="mt-4">Endpoints:</h5><pre><code><span class="endpoint-badge badge-get">GET</span>    /api/supplier
<span class="endpoint-badge badge-get">GET</span>    /api/supplier/{id}
<span class="endpoint-badge badge-post">POST</span>   /api/supplier
<span class="endpoint-badge badge-put">PUT</span>    /api/supplier/{id}
<span class="endpoint-badge badge-delete">DELETE</span> /api/supplier/{id}</code></pre></div></div>
                </div>

            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarLinks = document.querySelectorAll("#sidebar .nav-link");
            const contentContainer = document.getElementById("content-container");
            const apiSearchInput = document.getElementById("apiSearch");

            function activateContent(targetId) {
                sidebarLinks.forEach(navLink => navLink.classList.remove("active"));
                const collapses = contentContainer.querySelectorAll('.collapse.show');
                collapses.forEach(col => new bootstrap.Collapse(col, { toggle: false }).hide());
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    new bootstrap.Collapse(targetElement, { toggle: true }).show();
                    const correspondingLink = document.querySelector(`#sidebar a[href="#${targetId}"]`);
                    if (correspondingLink) correspondingLink.classList.add("active");
                }
            }

            sidebarLinks.forEach(link => {
                link.addEventListener("click", function(event) {
                    event.preventDefault();
                    const targetId = this.getAttribute("href").substring(1);
                    activateContent(targetId);
                });
            });

            apiSearchInput.addEventListener("keyup", function() {
                const searchTerm = apiSearchInput.value.toLowerCase().trim();
                let firstMatchLink = null;
                
                sidebarLinks.forEach(link => {
                    const linkText = link.textContent.trim().toLowerCase();
                    if (linkText.includes(searchTerm)) {
                        link.style.display = "flex";
                        if (!firstMatchLink) firstMatchLink = link;
                    } else {
                        link.style.display = "none";
                    }
                });

                if (firstMatchLink) {
                    const targetId = firstMatchLink.getAttribute("href").substring(1);
                    activateContent(targetId);
                } else if (searchTerm === '') {
                    activateContent('welcome-content');
                }
            });
            activateContent('welcome-content');
        });
    </script>
</body>
</html>