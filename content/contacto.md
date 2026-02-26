+++
title = "Contacto"
date = "2026-02-25T09:52:45-05:00"
draft = true

# SEO
meta_description = "Descripción corta de la página para motores de búsqueda"
meta_keywords = "palabra1, palabra2, palabra3"
canonical = "https://seguridadsocialfacil.com/ruta-de-la-pagina"

# Open Graph
og_title = "Título para Open Graph"
og_description = "Descripción para Open Graph"
og_image = "https://seguridadsocialfacil.com/images/imagen-og.jpg"
og_type = "article"  # 'article' o 'website'

# Twitter
twitter_card = "summary_large_image"  # summary o summary_large_image
twitter_site = "@SeguridadSocial"     # tu handle de Twitter

# JSON-LD dinámico
# Puedes agregar múltiples bloques JSON-LD en un array
schema = [
  """
  {
    "@context": "https://schema.org",
    "@type": "HowTo",
    "name": "Cómo afiliarse a EPS",
    "step": [
      { "@type": "HowToStep", "name": "Paso 1", "text": "Reunir documentos necesarios" },
      { "@type": "HowToStep", "name": "Paso 2", "text": "Enviar solicitud" }
    ]
  }
  """
]

[menu]
  [menu.main]
    weight = 6
+++

{{< contacto >}}