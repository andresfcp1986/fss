---
title: "Articulo de Prueba"
date: 2026-02-25T09:54:28-05:00
lastmod: 2026-02-25T09:54:28-05:00
draft: "false"
description: "Ejemplo de post con múltiples schemas"
image: "images/59883.avif"

# Categorías del post
categories: []  # Ej: ["Seguridad Social", "Trámites"]

# Tags del post
tags: []  # Ej: ["FAQ", "Guía", "Tutorial"]

# Schemas: puedes activar uno o varios descomentando
#schemas:
#  # Schema tipo Article (artículo del blog)
#  - "@context": "https://schema.org"
#    "@type": "Article"
#    headline: "Que busca en seguridad social"
#    author: "Tu Nombre"
#    datePublished: 2026-02-25T09:54:28-05:00
#    image: "images/og-image.jpg"
#
#  # Schema tipo FAQPage (preguntas frecuentes)
#  - "@context": "https://schema.org"
#    "@type": "FAQPage"
#    mainEntity:
#      - "@type": "Question"
#        name: "¿Qué es la seguridad social?"
#        acceptedAnswer:
#          "@type": "Answer"
#          text: "La seguridad social es un sistema que protege a los ciudadanos."
#      - "@type": "Question"
#        name: "¿Quiénes están obligados a cotizar?"
#        acceptedAnswer:
#          "@type": "Answer"
#          text: "Todas las personas que trabajan bajo contrato deben cotizar."
#
#  # Schema tipo HowTo (pasos o tutoriales)
#  - "@context": "https://schema.org"
#    "@type": "HowTo"
#    name: "Cómo consultar tu estado de seguridad social"
#    step:
#      - "@type": "HowToStep"
#        name: "Paso 1"
#        text: "Ingresa a la página oficial del sistema de seguridad social."
#      - "@type": "HowToStep"
#        name: "Paso 2"
#        text: "Inicia sesión con tu número de identificación."
#      - "@type": "HowToStep"
#        name: "Paso 3"
#        text: "Consulta tu estado y descarga tu certificado."

# No olvidar colocar el {{< toc >}}

# shortcode de imagen: 

# {{< figure 
#    src="/images/mi-imagen.avif" 
#    alt="Descripción de la imagen" 
#    width="600" 
#    height="400" 
#    caption="Esta es la leyenda de la imagen" 
#    lazy="true" 
#>}}

# Fin del front matter
---

Este es un artículo de prueba para verificar la **tabla de contenidos** y el funcionamiento de los shortcodes de imagen en Hugo.

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet tincidunt lorem.  

## Objetivos

- Probar TOC en desktop y móvil.
- Verificar que el toggle funcione correctamente.
- Comprobar la visualización de imágenes con shortcodes.
- Revisar estilos responsive.

# Sección 1: Markdown Básico

El Markdown permite crear **listas**, **negritas**, *cursivas* y enlaces fácilmente.

### Lista numerada

1. Primer punto
2. Segundo punto
3. Tercer punto

### Lista con viñetas

- Item A
- Item B
- Item C

### Enlaces internos

Puedes saltar a [Sección 2](#sección-2-imágenes) para ver los ejemplos de imágenes.

# Sección 2: Imágenes

Aquí podemos probar los shortcodes de Hugo para imágenes:

{{< figure 
    src="/images/59883.avif" 
    alt="Imagen de prueba" 
    width="800" 
    height="600" 
    caption="Esta es la leyenda de la imagen de prueba" 
    lazy="true" 
>}}

Otra imagen sin leyenda:

{{< figure 
    src="/images/59883.avif" 
    alt="Imagen de prueba" 
    width="400" 
    height="300" 
    lazy="true" 
>}}

# Sección 3: Tablas

También se pueden probar tablas en Markdown:

| Nombre   | Edad | Ciudad      |
|----------|------|------------|
| Ana      | 25   | Madrid     |
| Luis     | 30   | Barcelona  |
| Marta    | 28   | Valencia   |

# Sección 4: Código

Bloques de código con sintaxis resaltada:

```javascript
function saludo(nombre) {
    console.log(`Hola, ${nombre}!`);
}
saludo("Mundo");
```

# Frases Importantes

> es importate que afilies a tus empleados desde el primer dia.
