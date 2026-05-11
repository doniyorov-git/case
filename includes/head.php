<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?php echo isset($pageTitle) ? $pageTitle : 'MEDCASE - Master Clinical Reasoning'; ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "on-primary-container": "#7c839b",
                      "on-error": "#ffffff",
                      "surface-container": "#e5eeff",
                      "tertiary-fixed-dim": "#6bd8cb",
                      "on-secondary-container": "#fefcff",
                      "tertiary-container": "#00201d",
                      "on-secondary": "#ffffff",
                      "on-primary-fixed-variant": "#3f465c",
                      "tertiary-fixed": "#89f5e7",
                      "on-tertiary-fixed-variant": "#005049",
                      "outline": "#76777d",
                      "surface-container-lowest": "#ffffff",
                      "secondary-container": "#316bf3",
                      "error-container": "#ffdad6",
                      "primary-fixed-dim": "#bec6e0",
                      "error": "#ba1a1a",
                      "inverse-on-surface": "#eaf1ff",
                      "surface-container-low": "#eff4ff",
                      "on-primary-fixed": "#131b2e",
                      "surface-container-highest": "#d3e4fe",
                      "on-surface-variant": "#45464d",
                      "surface-bright": "#f8f9ff",
                      "outline-variant": "#c6c6cd",
                      "secondary-fixed-dim": "#b4c5ff",
                      "surface-dim": "#cbdbf5",
                      "surface-variant": "#d3e4fe",
                      "surface": "#f8f9ff",
                      "inverse-surface": "#213145",
                      "on-background": "#0b1c30",
                      "surface-container-high": "#dce9ff",
                      "on-secondary-fixed": "#00174b",
                      "primary-fixed": "#dae2fd",
                      "on-surface": "#0b1c30",
                      "on-tertiary": "#ffffff",
                      "background": "#f8f9ff",
                      "secondary": "#0051d5",
                      "secondary-fixed": "#dbe1ff",
                      "primary": "#000000",
                      "primary-container": "#131b2e",
                      "tertiary": "#000000",
                      "inverse-primary": "#bec6e0",
                      "on-error-container": "#93000a",
                      "on-secondary-fixed-variant": "#003ea8",
                      "on-tertiary-fixed": "#00201d",
                      "on-primary": "#ffffff",
                      "surface-tint": "#565e74",
                      "on-tertiary-container": "#0c9488"
              },
              "borderRadius": {
                      "DEFAULT": "0.25rem",
                      "lg": "0.5rem",
                      "xl": "0.75rem",
                      "full": "9999px"
              },
              "spacing": {
                      "lg": "24px",
                      "container-max": "1440px",
                      "unit": "4px",
                      "sm": "8px",
                      "xs": "4px",
                      "md": "16px",
                      "xl": "40px",
                      "gutter": "24px"
              },
              "fontFamily": {
                      "h3": ["Manrope"],
                      "h2": ["Manrope"],
                      "label-caps": ["Inter"],
                      "body-lg": ["Inter"],
                      "display": ["Manrope"],
                      "body-sm": ["Inter"],
                      "status": ["Inter"],
                      "body-md": ["Inter"],
                      "h1": ["Manrope"]
              },
              "fontSize": {
                      "h3": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                      "h2": ["24px", {"lineHeight": "1.3", "fontWeight": "700"}],
                      "label-caps": ["12px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "700"}],
                      "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                      "display": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                      "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}],
                      "status": ["13px", {"lineHeight": "1", "fontWeight": "600"}],
                      "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}],
                      "h1": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "700"}]
              }
            },
          },
        }
    </script>
    <style>
        .material-symbols-outlined {
          font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .material-symbols-outlined.fill {
          font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        .soft-medical-shadow {
            box-shadow: 0 4px 20px rgba(0, 81, 213, 0.04);
        }
        .btn-primary-glow {
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.2), 0 2px 4px rgba(0, 81, 213, 0.2);
        }
    </style>
</head>
<body class="bg-background text-on-background antialiased font-body-md selection:bg-secondary-container selection:text-on-secondary-container">
