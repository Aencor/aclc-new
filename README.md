# ACLC — Advanced Coaching & Leadership Center

Sitio web oficial y plataforma digital para **Advanced Coaching & Leadership Center (ACLC)**, desarrollado sobre el tema base personalizado **`codebymonk`** en WordPress.

---

## 🛠 Requisitos del Entorno
* [Docker Desktop](https://www.docker.com/)
* [Node.js](https://nodejs.org/en/) (v18+)
* [Visual Studio Code](https://code.visualstudio.com/) o IDE compatible
* Reverse Proxy local configurado para enrutamiento `*.com` (puertos 80/443).

---

## 🚀 Stack Tecnológico
* **WordPress**: CMS principal (configurado con permalinks `/%postname%/`).
* **ACF Pro (Advanced Custom Fields Pro)**: Gestión 100% dinámica de bloques Gutenberg, CPTs y campos personalizados.
* **Tailwind CSS v4 & SCSS Modular**: Utilidades de diseño, variables de marca y arquitectura CSS optimizada.
* **GSAP (GreenSock)**: Animaciones, interactividad, transiciones y canvas dinámicos (`ScrollTrigger`, `Flip`, etc.).
* **Laravel Mix (Webpack)**: Compilación de estilos y empaquetado de scripts JavaScript.
* **WPML / Arquitectura Multiidioma**: Soporte bidireccional Inglés (`/`) y Español (`/es/`).
* **WP Migrate DB Pro**: Sincronización y despliegue entre entornos local y WP Engine.

---

## 💻 Inicio Rápido en Local

### 1. Iniciar Contenedores Docker
```bash
docker compose up -d
```
El contenedor de WordPress (`aclc-wp`) se vincula a la red de proxy local resolviendo bajo el dominio:
```text
https://local.aclc.com/
```

### 2. Compilar Recursos Frontend
En la raíz del proyecto:
```bash
# Instalar dependencias de Node
npm install

# Modo desarrollo con auto-recarga
npm run watch

# Compilación optimizada para producción
npm run prod
```
Los archivos finales se compilan dentro de `wp-content/themes/codebymonk/assets/build/` con versionado dinámico (`filemtime`) para evitar problemas de caché en el navegador.

---

## 📂 Estructura del Proyecto

```text
├── design/                          # Diseños de referencia y prototipo interactivo (prototype-aclc.html)
├── docker-compose.yml               # Configuración de servicios Docker (WP, MariaDB, PhpMyAdmin)
├── AGENTS.md                        # Reglas y estándares estrictos de desarrollo del proyecto
└── wp-content/
    ├── plugins/                     # Plugins del proyecto (ACF Pro, WP Migrate DB Pro, OTGS)
    └── themes/
        └── codebymonk/              # Tema base activo
            ├── acf-json/            # Sincronización automática de campos ACF en JSON
            ├── assets/
            │   ├── build/           # Archivos compilados finales (style.css, main.js)
            │   ├── img/             # Estructura semántica estricta de imágenes:
            │   │   ├── backgrounds/ # Fondos, texturas y paisajes (ej. Letoli Ranch)
            │   │   ├── blocks/      # Vistas previas / screenshots de bloques ACF
            │   │   ├── icons/       # Iconografía SVG y gráficos
            │   │   ├── logos/       # Logotipos, isotipos y favicons
            │   │   └── photos/      # Fotografías de coaches, clientes y testimonios
            │   ├── js/              # Módulos JS (aclc.js, animaciones, router)
            │   └── scss/            # Arquitectura SCSS modular (main, blocks, sections)
            ├── blocks/              # Plantillas PHP de los bloques Gutenberg de ACF
            ├── classes/             # Clases PHP (POO): PostTypes.php, Taxonomies.php
            ├── functions/           # Inicialización, scripts, bloques y configuración
            ├── footer.php           # Pie de página con selector y enlaces multilingües
            ├── header.php           # Cabecera con navegación individual y selector EN | ES
            └── functions.php        # Punto de entrada de funciones del tema
```

---

## 🧱 Bloques Gutenberg ACF Creados

Todos los componentes visuales están implementados como bloques Gutenberg en `blocks/`, con campo **Accordion** inicial obligatorio para fácil gestión en WP Admin y soporte `$is_preview` para el selector de bloques:

1. **`hero`**: Hero interactivo con canvas animado, video modal y tarjeta de programas en vivo.
2. **`zones`**: Explicación interactiva de las Zonas de Vida (Red, Amber, Green).
3. **`coaches-showcase`**: Cuadrícula de coaches con tarjeta destacada de *Coaching en Español*.
4. **`program-ladder`**: Escalera de programas (inmersiones, online y autoestudio).
5. **`program-detail`**: Detalle inmersivo de Vital Fundamentals ($3,997, 8 días en Letoli Ranch).
6. **`coaching-paths`**: Rutas de coaching 1-a-1 (Sesión inicial, Procesamiento, Coach de Clase Mundial).
7. **`profiles-grid`**: Diagnósticos de Zonas de Vida (Financiero, Vida y Habilidades, Cuerpo).
8. **`testimonials-grid`**: Testimonios y métricas (+2.4x ingresos, 91% decisiones críticas, caso Kiyosaki).
9. **`book-showcase`**: Presentación del libro *The Fire Within* de Alan C. Walter / Ceil Stanford.
10. **`reading-list`**: Lista ordenada de lecturas de Knowledgism con sección de títulos en español.
11. **`calendar-events`**: Calendario interactivo con filtrado de fechas presenciales y online.
12. **`lead-form`**: Formulario interactivo de registro con selector de idioma y checkboxes de interés.
13. **`newsletter-band`**: Banda de suscripción a *The Thought of the Week*.
14. **`contact-ranch`**: Información de contacto y ubicación de Letoli Ranch en Texas.
15. **`legal-content`**: Plantilla para Políticas de Privacidad y Cookies con reactivación de consentimientos.

---

## 🗺 Páginas y Arquitectura de URLs

El sitio opera mediante páginas individuales dedicadas en WordPress:

| Página | URL en Inglés | URL en Español | Bloques Principales |
| :--- | :--- | :--- | :--- |
| **Inicio** | `/` | `/es/` | `hero`, `zones`, `coaches-showcase`, `newsletter-band` |
| **Programas** | `/programs/` | `/es/programas/` | `program-ladder`, `newsletter-band` |
| **Vital Fundamentals** | `/vital-fundamentals/` | `/vital-fundamentals/` | `program-detail`, `newsletter-band` |
| **Coaching 1-a-1** | `/coaching/` | `/es/coaching/` | `coaching-paths`, `newsletter-band` |
| **Perfiles de Zonas** | `/profiles/` | `/es/perfiles/` | `profiles-grid`, `newsletter-band` |
| **Coaches** | `/coaches/` | `/es/coaches/` | `coaches-showcase`, `newsletter-band` |
| **Clientes** | `/clients/` | `/clients/` | `testimonials-grid`, `newsletter-band` |
| **The Fire Within** | `/the-fire-within/` | `/the-fire-within/` | `book-showcase`, `newsletter-band` |
| **Calendario / Cursos**| `/calendar/` | `/calendar/` | `calendar-events`, `newsletter-band` |
| **Lecturas** | `/reading/` | `/es/lectura/` | `reading-list`, `newsletter-band` |
| **Registro** | `/register/` | `/es/registro/` | `lead-form` |
| **Contacto** | `/contact/` | `/es/contacto/` | `contact-ranch` |
| **Privacidad** | `/privacy-policy/` | `/privacy-policy/` | `legal-content` |
| **Cookies** | `/cookie-policy/` | `/cookie-policy/` | `legal-content` |

---

## 🌐 Entorno Remoto (Staging / WP Engine)
* **URL Remota**: [https://aclc1dev.wpenginepowered.com](https://aclc1dev.wpenginepowered.com)
* **Despliegues**: Sincronización integral mediante **WP Migrate DB Pro** (Base de datos, Medios, Temas y Plugins).

---

## 📜 Reglas de Desarrollo (`AGENTS.md`)
1. **Tema Base**: Todo desarrollo se implementa exclusivamente en `codebymonk`.
2. **Estructura ACF**: Cada bloque lleva un campo `Accordion` al inicio y versionado en `acf-json/`.
3. **Contenido Dinámico**: Cero texto hardcodeado en PHP; 100% editable vía ACF.
4. **Organización de Imágenes**: Ubicación obligatoria en subcarpetas semánticas dentro de `assets/img/`.
5. **Limpieza Pre-Commit**: Ningún otro tema permitido en `wp-content/themes/` antes de realizar commit.
6. **Convención de Commits**: Título conciso + cuerpo descriptivo estructurado.
7. **Prohibición de Push Automático**: **NUNCA ejecutar `git push` automáticamente**; mantener commits en local hasta indicación explícita del usuario.
