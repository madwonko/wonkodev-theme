# Wonkodev WordPress Theme

A modern, quirky WordPress theme with terminal/code aesthetic for developer-focused content.

## Version
1.0.0

## Description
Wonkodev is a custom WordPress theme designed for developer portfolios, plugin showcase sites, and tech-focused businesses. It features a unique terminal-inspired design with monospace typography, code-style elements, and playful animations.

## Features

### Design
- **Terminal Aesthetic**: Command line-inspired design elements
- **Monospace Typography**: Uses Fira Code font for authentic code feel
- **Gradient Accents**: Modern color gradients throughout
- **Responsive Design**: Mobile-first approach, works on all devices
- **Custom Animations**: Smooth transitions and scroll animations

### Functionality
- **Custom Post Types**: 
  - Plugins (for showcasing WordPress plugins)
  - Documentation (for creating docs)
- **Custom Taxonomies**: Plugin categories
- **Widget Areas**: Sidebar and 3 footer columns
- **Navigation Menus**: Primary header and footer menus
- **Custom Meta Boxes**: Plugin version, download URLs, demo links, etc.

### Page Templates
- Homepage (front-page.php) - Hero section + featured plugins
- Blog listing (index.php)
- Single post (single.php)
- Static pages (page.php)

### Technical Features
- HTML5 markup
- CSS3 with CSS variables
- jQuery-based interactions
- WordPress customizer support
- Translation ready
- SEO friendly
- Performance optimized

## Installation

1. Download the theme files
2. Upload to `/wp-content/themes/wonkodev/`
3. Activate the theme in WordPress admin
4. Go to Appearance → Customize to configure

## Setup

### 1. Configure Menus
- Go to Appearance → Menus
- Create menus for "Primary Menu" and "Footer Menu"

### 2. Add Widgets
- Go to Appearance → Widgets
- Add widgets to Sidebar, Footer Column 1, 2, and 3

### 3. Upload Logo
- Go to Appearance → Customize → Site Identity
- Upload your logo (recommended: SVG format, 300x60px)

### 4. Create Content

**Add Plugins:**
1. Go to Plugins → Add New Plugin (in WP admin)
2. Fill in plugin details (title, description, version, URLs)
3. Set a featured image
4. Assign plugin categories

**Add Documentation:**
1. Go to Documentation → Add New Doc
2. Create hierarchical documentation pages
3. Use page attributes to set parent pages

### 5. Set Homepage
- Go to Settings → Reading
- Set "A static page" as homepage
- Select your homepage (or it will use front-page.php automatically)

## Customization

### Colors
Edit CSS variables in `style.css`:
```css
:root {
    --color-primary: #10B981;  /* Main green */
    --color-secondary: #06B6D4; /* Cyan */
    --color-dark: #1F2937;     /* Dark gray */
}
```

### Typography
Change fonts in `functions.php`:
```php
wp_enqueue_style('wonkodev-fonts', 'URL_TO_YOUR_FONT');
```

### Layout
Modify container widths in `style.css`:
```css
.container { max-width: 1200px; }
.container-narrow { max-width: 800px; }
```

## File Structure

```
wonkodev-theme/
├── style.css           # Main stylesheet
├── functions.php       # Theme functions
├── header.php          # Header template
├── footer.php          # Footer template
├── index.php           # Blog listing
├── front-page.php      # Homepage template
├── single.php          # Single post
├── page.php            # Static pages
├── js/
│   └── scripts.js      # JavaScript
├── images/
│   └── logo.svg        # Theme logo
└── README.md           # This file
```

## Browser Support
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Credits

### Fonts
- Fira Code by Mozilla (https://github.com/tonsky/FiraCode)

### Built With
- WordPress
- CSS3
- JavaScript/jQuery

## Support
For support and questions:
- Website: https://wonkodev.com
- Email: support@wonkodev.com

## Changelog

### Version 1.0.0 (2025)
- Initial release
- Homepage with hero section
- Plugin showcase functionality
- Documentation post type
- Blog templates
- Mobile responsive design
- Custom animations

## License
This theme is licensed under the GPL v2 or later.

## Author
MadWonko
https://wonkodev.com

---

**Enjoy building with Wonkodev!** 🚀
# wonkodev-theme
