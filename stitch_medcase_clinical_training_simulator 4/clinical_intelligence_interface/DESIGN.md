---
name: Clinical Intelligence Interface
colors:
  surface: '#f8f9ff'
  surface-dim: '#cbdbf5'
  surface-bright: '#f8f9ff'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#eff4ff'
  surface-container: '#e5eeff'
  surface-container-high: '#dce9ff'
  surface-container-highest: '#d3e4fe'
  on-surface: '#0b1c30'
  on-surface-variant: '#45464d'
  inverse-surface: '#213145'
  inverse-on-surface: '#eaf1ff'
  outline: '#76777d'
  outline-variant: '#c6c6cd'
  surface-tint: '#565e74'
  primary: '#000000'
  on-primary: '#ffffff'
  primary-container: '#131b2e'
  on-primary-container: '#7c839b'
  inverse-primary: '#bec6e0'
  secondary: '#0051d5'
  on-secondary: '#ffffff'
  secondary-container: '#316bf3'
  on-secondary-container: '#fefcff'
  tertiary: '#000000'
  on-tertiary: '#ffffff'
  tertiary-container: '#00201d'
  on-tertiary-container: '#0c9488'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#dae2fd'
  primary-fixed-dim: '#bec6e0'
  on-primary-fixed: '#131b2e'
  on-primary-fixed-variant: '#3f465c'
  secondary-fixed: '#dbe1ff'
  secondary-fixed-dim: '#b4c5ff'
  on-secondary-fixed: '#00174b'
  on-secondary-fixed-variant: '#003ea8'
  tertiary-fixed: '#89f5e7'
  tertiary-fixed-dim: '#6bd8cb'
  on-tertiary-fixed: '#00201d'
  on-tertiary-fixed-variant: '#005049'
  background: '#f8f9ff'
  on-background: '#0b1c30'
  surface-variant: '#d3e4fe'
typography:
  display:
    fontFamily: Manrope
    fontSize: 48px
    fontWeight: '800'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  h1:
    fontFamily: Manrope
    fontSize: 32px
    fontWeight: '700'
    lineHeight: '1.2'
    letterSpacing: -0.01em
  h2:
    fontFamily: Manrope
    fontSize: 24px
    fontWeight: '700'
    lineHeight: '1.3'
  h3:
    fontFamily: Manrope
    fontSize: 20px
    fontWeight: '600'
    lineHeight: '1.4'
  body-lg:
    fontFamily: Inter
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.6'
  body-md:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.5'
  body-sm:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '400'
    lineHeight: '1.5'
  label-caps:
    fontFamily: Inter
    fontSize: 12px
    fontWeight: '700'
    lineHeight: '1'
    letterSpacing: 0.05em
  status:
    fontFamily: Inter
    fontSize: 13px
    fontWeight: '600'
    lineHeight: '1'
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  unit: 4px
  xs: 4px
  sm: 8px
  md: 16px
  lg: 24px
  xl: 40px
  container-max: 1440px
  gutter: 24px
---

## Brand & Style

This design system is engineered to bridge the gap between high-stakes medical software and advanced clinical simulation. The brand personality is rooted in **intellectual authority** and **unwavering reliability**. It avoids the generic "softness" often found in wellness apps, opting instead for a precision-grade aesthetic that mirrors professional diagnostic tools.

The visual style utilizes a **Modern Corporate** foundation augmented by **Technical Glassmorphism**. This combination ensures that while the core data remains grounded and legible, the interactive layers feel futuristic and high-dimension. The emotional response is one of calm focus, designed to reduce cognitive load during complex clinical decision-making. High-contrast typography and a restrained use of vibrant accents ensure that critical medical data is always the primary focal point.

## Colors

The palette is anchored by **Navy (#0F172A)** to establish depth and institutional trust. **Royal Blue (#2563EB)** serves as the primary action color, providing high-energy affordance for interactive elements. **Teal (#0D9488)** is used as a clinical accent, specifically for data visualization and health-positive indicators.

The neutral scale relies on **Slate Gray** to manage hierarchy without the harshness of pure black. Backgrounds utilize a "Soft White" strategy (#F8FAFC) to reduce eye strain during long-form simulation sessions. For the "Easy/Medium/Hard" logic, the system uses a sophisticated semantic palette that prioritizes accessibility and immediate recognition within a clinical context.

## Typography

This design system uses a dual-font strategy. **Manrope** is reserved for headlines and display elements to provide a refined, modern character that feels "premium." **Inter** is used for all functional body text, labels, and data points due to its exceptional legibility at small sizes and its neutral, systematic appearance.

Hierarchy is enforced through high contrast between weights. Headers should use tight letter spacing and bold weights to command attention, while body text maintains generous line height for readability. Small labels and "clinical badges" utilize uppercase styling with increased tracking to differentiate metadata from primary narrative content.

## Layout & Spacing

The layout philosophy follows a **Fixed-Fluid Hybrid Grid**. Main dashboard containers adhere to a 12-column grid with 24px gutters, but the internal content of clinical cards uses a 4px baseline shift for micro-spacing.

Spacing is used to create "clinical breathing room." Components are never cramped; instead, they use whitespace to isolate critical data points. Margins for major sections should be 40px (xl) to create a sense of premium architectural space, while interactive elements like input fields use 16px (md) internal padding for a balanced touch/click target.

## Elevation & Depth

This design system employs a **Tonal-Glassmorphic layering** model. Depth is not communicated through heavy shadows, but through subtle shifts in surface transparency and highly diffused blurs.

1.  **Level 0 (Canvas):** Soft white (#F8FAFC) - the base ground.
2.  **Level 1 (Cards):** Pure white with a 1px Slate-200 border and a "Soft Medical Shadow" (Y: 4px, Blur: 20px, 4% Opacity Navy).
3.  **Level 2 (Overlays/Modals):** Subtle Glassmorphism. White background at 80% opacity with a 20px backdrop blur and a vibrant white inner stroke.
4.  **Level 3 (Popovers/Tooltips):** High-contrast Navy backgrounds for immediate focus against the lighter canvas.

Shadows should always be tinted with the primary Navy color rather than pure black to maintain a "clean" clinical feel.

## Shapes

The shape language is defined by **Structured Softness**. Elements use a consistent 8px to 12px radius. 

- **Standard Components:** 8px (Buttons, Inputs, Chips).
- **Surface Containers:** 12px (Dashboard Cards, Modals).
- **Special Elements:** Status badges and "Easy/Medium/Hard" indicators use a full pill-shape (999px) to distinguish them from structural UI elements.

This range provides a modern, approachable feel while maintaining the rigid alignment required for professional medical software.

## Components

### Buttons & Actions
Primary buttons use the **Royal Blue** background with white text. They feature a subtle inner glow on the top edge to simulate a "premium" tactile feel. Secondary actions use a ghost-style Navy border (1px) with a subtle Slate-50 background on hover.

### Dashboard Cards
Cards are the heart of the interface. They must include a 1px border (#E2E8F0) and a "clinical header" — a subtle gray background section at the top of the card that houses the icon and title, separating metadata from the card's content.

### Status Chips & Clinical Badges
- **Status Chips:** Pill-shaped, using a light tint of the semantic color for the background and a dark shade for text (e.g., Hard: Red-100 background, Red-700 text).
- **Clinical Badges:** Rectangular with 4px corners, using Slate-100 and Navy text to indicate technical specifications like "Vitals Monitor" or "ECG Input."

### Glassmorphic Modals
Modals must utilize the backdrop-blur (20px) to obscure the dashboard behind them, creating a "simulator focus" mode. They are centered with a 1px white border to define their edges against the blur.

### Progress Indicators
Progress bars should be thin (4px-6px) and use the Teal accent. For multi-step simulators, use "segmented progress" where each step is a discrete block, providing clear visual milestones for the user.