# Wonkodev Theme - Installation & Setup Guide

## Quick Start

### 1. Install the Theme

**Option A: Upload via WordPress Admin**
1. Go to your WordPress admin dashboard
2. Navigate to Appearance → Themes → Add New
3. Click "Upload Theme"
4. Choose the `wonkodev-theme.zip` file
5. Click "Install Now"
6. Click "Activate"

**Option B: Manual Installation via FTP**
1. Unzip the `wonkodev-theme.zip` file
2. Upload the `wonkodev-theme` folder to `/wp-content/themes/`
3. Go to Appearance → Themes in WordPress admin
4. Find "Wonkodev" and click "Activate"

### 2. Initial Configuration

#### A. Upload Your Logo
1. Go to Appearance → Customize
2. Click "Site Identity"
3. Click "Select Logo"
4. Upload the `logo-v5-terminal.svg` file (included in package)
5. Crop if needed and click "Publish"

#### B. Set Up Menus
1. Go to Appearance → Menus
2. Create a new menu called "Primary Menu"
3. Add pages: Home, Plugins, Blog, Docs, Contact
4. Assign to "Primary Menu" location
5. Create another menu called "Footer Menu"
6. Add pages you want in footer
7. Assign to "Footer Menu" location

#### C. Configure Homepage
1. Create a new page called "Home" (leave it blank or add custom content)
2. Go to Settings → Reading
3. Select "A static page" for homepage displays
4. Choose "Home" as the homepage
5. Choose "Blog" or create a new page for posts page
6. Click "Save Changes"

### 3. Add Your Plugins

#### Create Plugin Entries
1. In WordPress admin, you'll see "Plugins" in the sidebar (this is for your plugin showcase, not WordPress plugins)
2. Click Plugins → Add New Plugin
3. Fill in the details:
   - **Title**: Your plugin name (e.g., "Band Song Manager")
   - **Content**: Full description of the plugin
   - **Excerpt**: Short description (appears on cards)
   - **Featured Image**: Upload a plugin icon or screenshot
   - **Plugin Details** (meta box on right):
     - Version: e.g., "1.0.0"
     - Download URL: Link to download the plugin
     - Demo URL: Link to live demo
     - Documentation URL: Link to docs
     - GitHub URL: Link to GitHub repo
   - **Plugin Categories**: Create and assign categories (e.g., "Audio", "Music", "Utilities")
4. Click "Publish"

#### Example Plugin Entry

**Title**: RadioPeng Audio Player

**Content**:
```
A powerful music player plugin that connects to your AzuraCast radio station and displays live metadata including song title, artist, album artwork, DJ information, and listener count.

Features:
* Live metadata display (song, artist, album art)
* DJ detection (Live DJ vs AutoDJ)
* Real-time listener count
* Three display modes: Standard, Popup, and Online
* Volume control
* Auto-updating metadata
* Responsive design

For support, visit wonkoworld.com
```

**Excerpt**:
```
A powerful music player plugin that connects to your AzuraCast radio station with live metadata display.
```

**Version**: 1.2.0
**Download URL**: https://wonkodev.com/downloads/radiopeng-audio-player.zip
**Demo URL**: https://demo.wonkodev.com/radiopeng
**Docs URL**: https://wonkodev.com/docs/radiopeng

### 4. Create Documentation

1. Go to Documentation → Add New Doc
2. Create hierarchical documentation:
   - Create parent pages (e.g., "Getting Started", "Plugin Name Documentation")
   - Create child pages using "Page Attributes" → "Parent" dropdown
3. Use the WordPress editor to add your documentation content
4. Publish

### 5. Add Footer Widgets

1. Go to Appearance → Widgets
2. Add widgets to the three footer areas:

**Footer Column 1 - About**
- Add a "Text" widget
- Title: "About Wonkodev"
- Content: Brief company description

**Footer Column 2 - Quick Links**
- Add a "Navigation Menu" widget
- Title: "Quick Links"
- Select your footer menu

**Footer Column 3 - Connect**
- Add a "Custom HTML" widget
- Title: "Connect"
- Add links to your social media

### 6. Customize Colors (Optional)

If you want to change the theme colors:

1. Go to Appearance → Theme File Editor
2. Select `style.css`
3. Find the `:root` section (near the top)
4. Modify the color variables:
```css
:root {
    --color-primary: #10B981;    /* Main green - change this */
    --color-secondary: #06B6D4;  /* Cyan - change this */
    --color-dark: #1F2937;       /* Dark gray - change this */
}
```
5. Click "Update File"

### 7. Create Essential Pages

Create these pages for a complete site:

**Home** (already created)
- This uses the special homepage template

**Plugins**
- Title: "Our Plugins"
- Content: Add intro text, the plugin grid will show automatically via WordPress query

**Blog**
- This is set as your posts page in Settings → Reading

**Contact**
- Title: "Contact Us"
- Content: Add a contact form using Contact Form 7 or similar plugin

**Documentation**
- Title: "Documentation"
- Content: Add intro text and links to documentation sections

### 8. Add Blog Posts

1. Go to Posts → Add New
2. Write your blog content
3. Add a featured image
4. Assign categories and tags
5. Publish

## Theme Features to Know

### Custom Post Types
- **Plugins**: For showcasing your WordPress plugins
- **Documentation**: For creating hierarchical docs

### Widget Areas
- Sidebar (for blog posts)
- Footer Column 1, 2, 3

### Navigation Menus
- Primary Menu (header)
- Footer Menu (footer)

### Styling Elements

**Code Blocks**: Use the code block in WordPress editor, it will automatically style with syntax highlighting

**Buttons**: Use button blocks with these classes:
- `.btn-primary` - Green gradient button
- `.btn-secondary` - Transparent outline button

**Terminal Prompt**: Any text with class `.hero-prompt` gets the terminal prompt styling

## Troubleshooting

### Logo Not Showing
- Make sure you uploaded it via Customizer → Site Identity
- SVG format recommended
- Fallback text will show if no logo is set

### Menus Not Appearing
- Create menus in Appearance → Menus
- Assign them to locations (Primary Menu, Footer Menu)

### Plugins Not Showing on Homepage
- Create plugin entries using Plugins → Add New Plugin
- Make sure they're published
- They'll automatically appear on the front page

### Homepage Showing Blog Posts
- Go to Settings → Reading
- Select "A static page"
- Choose your homepage

## Next Steps

1. ✅ Install theme
2. ✅ Upload logo
3. ✅ Create menus
4. ✅ Set homepage
5. ✅ Add plugin entries
6. ✅ Create pages
7. ✅ Add footer widgets
8. ✅ Start blogging!

## Support

Need help? Contact us:
- Website: https://wonkodev.com
- Email: support@wonkodev.com

## Enjoy Your New Theme! 🚀

Your site is now ready with a unique terminal-inspired design perfect for showcasing your development work.
