# Wonkodev WordPress Theme

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![WordPress](https://img.shields.io/badge/wordpress-5.0%2B-blue.svg)
![License](https://img.shields.io/badge/license-GPL--2.0%2B-green.svg)

A modern, quirky WordPress theme with terminal/code aesthetic for developer-focused content. Perfect for showcasing WordPress plugins, development portfolios, and tech-focused businesses.

![Wonkodev Theme](https://via.placeholder.com/1200x400/1F2937/10B981?text=Wonkodev+WordPress+Theme)
*Screenshot placeholder - replace with actual screenshot*

## Features

### 🎨 Unique Terminal Design
- **Command Line Aesthetic**: Terminal-inspired design elements throughout
- **Monospace Typography**: Fira Code font for authentic developer feel
- **Code-Style Elements**: Prompts, comments, and syntax-inspired styling
- **Gradient Accents**: Modern green-to-cyan color transitions
- **Blinking Cursor**: Animated cursor effects for extra personality

### 📦 Custom Post Types
- **Plugins Showcase**: Dedicated post type for displaying WordPress plugins
  - Version tracking
  - Download links
  - Demo URLs
  - Documentation links
  - GitHub integration
  - Plugin categories
- **Documentation**: Hierarchical documentation system
  - Parent/child page structure
  - Organized knowledge base
  - Easy navigation

### 🎯 Page Templates
- **Homepage**: Hero section with featured plugins grid
- **Blog Listing**: Clean, card-based post layout
- **Single Post**: Optimized reading experience
- **Static Pages**: Flexible page template
- **Plugin Archive**: Automatic plugin showcase
- **Documentation**: Structured docs display

### 🎛️ Customization Options
- **Custom Logo**: Upload your own logo (SVG recommended)
- **Navigation Menus**: Primary header and footer menus
- **Widget Areas**: Sidebar + 3 footer columns
- **Color Variables**: Easy CSS variable customization
- **Custom Backgrounds**: WordPress customizer support

### 📱 Modern Development
- **Responsive Design**: Mobile-first approach
- **Performance Optimized**: Fast loading, minimal JavaScript
- **SEO Friendly**: Clean markup and semantic HTML5
- **Accessibility Ready**: WCAG compliant structure
- **Translation Ready**: Fully internationalized

### ✨ Interactive Features
- **Smooth Animations**: Scroll-triggered content animations
- **Hover Effects**: Interactive plugin cards
- **Code Highlighting**: Syntax highlighting for code blocks
- **Copy Buttons**: One-click code copying
- **Back to Top**: Convenient scroll-to-top button

## Installation

### Via WordPress Admin

1. Download the theme zip file
2. Go to **Appearance** → **Themes** → **Add New**
3. Click **Upload Theme**
4. Choose the `wonkodev-theme.zip` file
5. Click **Install Now**
6. Click **Activate**

### Via FTP

1. Download and unzip the theme file
2. Upload the `wonkodev-theme` folder to `/wp-content/themes/`
3. Go to **Appearance** → **Themes** in WordPress admin
4. Find "Wonkodev" and click **Activate**

### Via WP-CLI

```bash
wp theme install wonkodev-theme.zip --activate
```

## Quick Start Guide

### 1. Upload Your Logo

1. Go to **Appearance** → **Customize**
2. Click **Site Identity**
3. Upload your logo (SVG format recommended, 300x60px)
4. Click **Publish**

### 2. Create Menus

**Primary Menu (Header):**
1. Go to **Appearance** → **Menus**
2. Create a new menu: "Primary Menu"
3. Add pages: Home, Plugins, Blog, Docs, Contact
4. Assign to **"Primary Menu"** location
5. Click **Save Menu**

**Footer Menu:**
1. Create another menu: "Footer Menu"
2. Add pages: About, Privacy, Terms, Support
3. Assign to **"Footer Menu"** location
4. Click **Save Menu**

### 3. Set Homepage

1. Create a new page titled "Home"
2. Go to **Settings** → **Reading**
3. Select **"A static page"**
4. Choose **"Home"** as Homepage
5. Choose or create a page for Posts page
6. Click **Save Changes**

### 4. Add Your First Plugin

1. Go to **Plugins** → **Add New Plugin** (in the sidebar - this is for showcase, not actual WP plugins)
2. Fill in plugin details:
   - **Title**: Plugin name
   - **Content**: Full description and features
   - **Excerpt**: Short description (for cards)
   - **Featured Image**: Plugin icon/screenshot
   - **Version**: Current version number
   - **Download URL**: Link to download
   - **Demo URL**: Live demo link
   - **Documentation URL**: Docs page
   - **GitHub URL**: Repository link
3. Assign **Plugin Categories**
4. Click **Publish**

### 5. Configure Footer

1. Go to **Appearance** → **Widgets**
2. Add widgets to footer areas:
   - **Footer Column 1**: Text widget with about info
   - **Footer Column 2**: Navigation menu widget
   - **Footer Column 3**: Custom HTML with social links

## Customization

### Changing Colors

Edit CSS variables in **Appearance** → **Customize** → **Additional CSS**:

```css
:root {
    --color-primary: #10B981;    /* Main green */
    --color-secondary: #06B6D4;  /* Cyan accent */
    --color-dark: #1F2937;       /* Dark charcoal */
    --color-gray: #6B7280;       /* Gray text */
}
```

### Custom Fonts

To use different fonts, edit the theme and enqueue new fonts in `functions.php`:

```php
wp_enqueue_style('custom-fonts', 'YOUR_FONT_URL');
```

Then update CSS variables:

```css
:root {
    --font-primary: 'Your Font', monospace;
    --font-body: 'Your Body Font', sans-serif;
}
```

### Layout Widths

Adjust container widths in **Additional CSS**:

```css
.container { max-width: 1400px; }
.container-narrow { max-width: 900px; }
```

### Custom Plugin Card Colors

Style individual plugin cards:

```css
.plugin-card:nth-child(1) .plugin-icon {
    background: linear-gradient(135deg, #FF6B6B, #FFD93D);
}
```

## Theme Structure

```
wonkodev-theme/
├── style.css              # Main stylesheet
├── functions.php          # Theme functions
├── header.php             # Header template
├── footer.php             # Footer template
├── front-page.php         # Homepage template
├── index.php              # Blog listing
├── single.php             # Single post
├── page.php               # Static pages
├── screenshot.svg         # Theme screenshot
├── README.md              # This file
├── INSTALLATION.md        # Detailed setup guide
├── js/
│   └── scripts.js         # JavaScript functionality
└── images/
    └── logo.svg           # Default logo
```

## Custom Post Types

### Plugins (`wonko_plugin`)

Display your WordPress plugins with full metadata:

**Custom Fields:**
- Version number
- Download URL
- Demo URL
- Documentation URL
- GitHub URL

**Taxonomies:**
- Plugin Categories (hierarchical)

**Usage:**
```php
// Query plugins
$args = array(
    'post_type' => 'wonko_plugin',
    'posts_per_page' => 6
);
$plugins = new WP_Query($args);
```

### Documentation (`wonko_docs`)

Create hierarchical documentation:

**Features:**
- Parent/child relationships
- Custom ordering
- Full content support

**Usage:**
```php
// Query docs
$args = array(
    'post_type' => 'wonko_docs',
    'orderby' => 'menu_order',
    'order' => 'ASC'
);
$docs = new WP_Query($args);
```

## Widget Areas

The theme includes 4 widget-ready areas:

1. **Sidebar**: Appears on blog posts
2. **Footer Column 1**: Left footer column
3. **Footer Column 2**: Center footer column
4. **Footer Column 3**: Right footer column

## CSS Classes & Hooks

### Utility Classes

```css
/* Text Alignment */
.text-center
.text-left
.text-right

/* Spacing */
.mt-1, .mt-2, .mt-3, .mt-4  /* Margin top */
.mb-1, .mb-2, .mb-3, .mb-4  /* Margin bottom */
.py-1, .py-2, .py-3, .py-4  /* Padding vertical */

/* Buttons */
.btn              /* Base button */
.btn-primary      /* Primary button */
.btn-secondary    /* Secondary button */
```

### Theme Hooks

```php
// Modify excerpt length
add_filter('wonkodev_excerpt_length', function($length) {
    return 50;
});

// Custom plugin meta box
add_action('wonkodev_plugin_details', function($post_id) {
    // Your custom fields
});
```

## Browser Support

- ✅ Chrome (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Edge (latest)
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

## Performance

### Optimization Features
- Minimal JavaScript dependencies
- Efficient CSS (no bloated frameworks)
- Lazy loading ready
- Clean, semantic HTML
- Optimized database queries

### Best Practices
- Use image optimization plugins
- Enable caching (WP Super Cache, W3 Total Cache)
- Use a CDN for static assets
- Minimize plugins

## SEO Features

- Semantic HTML5 markup
- Proper heading hierarchy
- Schema.org ready structure
- Clean URLs
- Fast page load times
- Mobile-responsive
- Accessible navigation

## Use Cases

### Plugin Developers
- Showcase your WordPress plugins
- Professional plugin portfolio
- Documentation hub
- Download center
- Support resources

### Development Agencies
- Display your services
- Project portfolio
- Team blog
- Client resources
- Technical documentation

### Developer Blogs
- Code tutorials
- Technical writing
- Project updates
- Developer tools
- Industry news

### Tech Startups
- Product showcase
- Feature documentation
- Company blog
- Developer resources
- API documentation

## Frequently Asked Questions

### Can I use this theme for a non-developer site?

While designed for developers, the theme is flexible enough for any use. The terminal aesthetic is quirky and modern.

### Does it work with page builders?

Yes! Works with Gutenberg, Elementor, Beaver Builder, and other popular page builders.

### Can I translate the theme?

Yes! The theme is translation-ready. Use Loco Translate or .po file editors.

### Will it work with WooCommerce?

Basic WooCommerce support is included, but you may need to add custom styling for full integration.

### Can I customize the homepage?

Yes! Either edit `front-page.php` or create a custom page template.

### How do I add social media icons?

Add them to Footer Column 3 using a Custom HTML widget or menu.

### Does it support custom post types from plugins?

Yes! The theme follows WordPress standards and supports any custom post types.

## Support

Need help? We're here for you!

- **Documentation**: [https://wonkodev.com/docs/wonkodev-theme](https://wonkodev.com/docs/wonkodev-theme)
- **Support Forum**: [https://wonkodev.com/support](https://wonkodev.com/support)
- **Email**: support@wonkodev.com
- **GitHub Issues**: [https://github.com/madwonko/wonkodev-theme/issues](https://github.com/madwonko/wonkodev-theme/issues)

## Contributing

Contributions are welcome! Here's how you can help:

1. **Report Bugs**: Open an issue with details and screenshots
2. **Suggest Features**: Share your ideas in the issues
3. **Submit Pull Requests**: Fork, improve, and submit PRs
4. **Improve Documentation**: Help make docs clearer
5. **Create Child Themes**: Share your customizations

### Development Setup

```bash
# Clone the repository
git clone https://github.com/madwonko/wonkodev-theme.git

# Navigate to theme directory
cd wonkodev-theme

# Create a symlink to your WordPress themes folder
ln -s $(pwd) /path/to/wordpress/wp-content/themes/wonkodev-theme
```

## Changelog

### Version 1.0.0 (2025-02-07)
- 🎉 Initial release
- ✅ Terminal/code aesthetic design
- ✅ Custom homepage with hero section
- ✅ Plugin showcase custom post type
- ✅ Documentation custom post type
- ✅ Blog templates
- ✅ Mobile responsive design
- ✅ Custom animations
- ✅ Widget areas (sidebar + footer)
- ✅ Navigation menus
- ✅ Customizer support
- ✅ Translation ready

## Roadmap

### Planned Features
- [ ] Dark mode toggle
- [ ] Additional page templates
- [ ] WooCommerce full integration
- [ ] More color schemes
- [ ] RTL language support
- [ ] Advanced customizer options
- [ ] Plugin compatibility checks
- [ ] Performance dashboard
- [ ] One-click demo import

## Credits

**Author**: MadWonko  
**Website**: [https://wonkodev.com](https://wonkodev.com)  
**GitHub**: [@madwonko](https://github.com/madwonko)

**Fonts:**
- Fira Code by Mozilla ([GitHub](https://github.com/tonsky/FiraCode))

**Inspiration:**
- Terminal interfaces
- Developer tools
- Code editors
- Modern web design

## License

This theme is licensed under the GPL v2 or later.

```
Wonkodev WordPress Theme
Copyright (C) 2025 MadWonko

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
```

## Show Your Support

If you find this theme useful, please:
- ⭐ Star this repository on GitHub
- 📝 Write a review on WordPress.org
- 🐦 Share it on social media
- 📸 Show us your site using #WonkodevTheme
- ☕ [Buy me a coffee](https://wonkodev.com/donate)

---

**Made with ♥ by MadWonko** | [Website](https://wonkodev.com) | [More Projects](https://wonkodev.com/plugins) | [Support](https://wonkodev.com/support)
