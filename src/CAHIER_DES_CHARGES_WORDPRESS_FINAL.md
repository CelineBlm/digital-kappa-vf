# CAHIER DES CHARGES - Conversion Digital Kappa vers WordPress/WooCommerce

## 📋 INFORMATIONS GÉNÉRALES

**Projet :** Digital Kappa - Marketplace de produits digitaux  
**Type :** Site e-commerce WordPress + WooCommerce  
**Produits :** Produits digitaux dématérialisés (Ebooks, Applications, Templates)  
**Source :** Projet React complet fourni sur GitHub (branch main)  
**Objectif :** Conversion pixel-perfect du design React vers WordPress avec Elementor

---

## 🎯 OBJECTIFS PRINCIPAUX

### 1. Création automatique complète
- **10 pages** créées automatiquement en PHP avec widgets Elementor custom
- **13 produits** importés automatiquement avec toutes leurs métadonnées
- **Header et Footer** créés avec Elementor Theme Builder
- **Template produit** créé avec widgets Elementor custom
- Configuration complète automatique (menus, pages WooCommerce, etc.)

### 2. Reproduction pixel-perfect du React
- **Textes** : Copier-coller exact depuis les fichiers React (valeurs par défaut des widgets)
- **Images** : Mêmes URLs Unsplash que le React (valeurs par défaut des widgets)
- **Sections** : Ordre identique au React (structure programmatique)
- **Styles** : Reproduction exacte de `/styles/globals.css`
- **Couleurs** : Charte graphique respectée (#d2a30b, #1a1a1a)
- **Typographies** : Montserrat + Merriweather

### 3. Édition complète avec Elementor
- **Pages créées en PHP** avec structure Elementor programmatique
- **Widgets Elementor custom** pour chaque section
- **Valeurs par défaut** = données exactes du React
- Header/Footer modifiables visuellement avec Elementor
- Toutes les pages éditables après création
- Menus WordPress éditables depuis l'admin

---

## 🛠️ STACK TECHNIQUE

### Technologies obligatoires

**WordPress :** Version 6.4+  
**WooCommerce :** Version 8.5+  
**Elementor :** Version gratuite 3.18+  
**ACF (Advanced Custom Fields) :** Version gratuite  
**PHP :** 8.0+  
**MySQL :** 5.7+

### Librairies CSS/JS

- **Tailwind CSS** : Framework CSS (via CDN)
- **Google Fonts** : Montserrat + Merriweather
- **Lucide Icons** : Icônes (via CDN ou inline SVG)
- **jQuery** : AJAX et interactions

---

## 📐 ARCHITECTURE DU SITE

### Pages à créer automatiquement (PHP + Widgets Elementor)

```
Digital Kappa (WordPress)
│
├── 📄 Accueil (create-homepage.php)
│   Source React : /App.tsx → HomePage.tsx
│   Widgets : Hero, Features, Stats, Product Grid, Process, Testimonials, FAQ, CTA
│   Définir comme : Page d'accueil
│
├── 📄 Comment ça marche (create-how-it-works.php)
│   Source React : /HowItWorks.tsx
│   Widgets : Page Header, Process Steps, CTA
│
├── 📄 FAQ (create-faq.php)
│   Source React : /FAQ.tsx
│   Widgets : Page Header, FAQ Accordion, Support CTA
│
├── 📄 À propos (create-about.php)
│   Source React : /About.tsx
│   Widgets : Page Header, Text Editor (contenu exact du React)
│
├── 📄 CGV (create-cgv.php)
│   Source React : /TermsOfSale.tsx
│   Widgets : Page Header, Text Editor (contenu légal exact)
│
├── 📄 Politique de confidentialité (create-privacy.php)
│   Source React : /PrivacyPolicy.tsx
│   Widgets : Page Header, Text Editor (contenu RGPD exact)
│
├── 🛍️ Tous nos produits (create-all-products.php)
│   Source React : /AllProducts.tsx
│   Widgets : Page Header, Product Filters, Product Listing
│   Définir comme : Page boutique WooCommerce
│
├── 🛒 Commande (create-checkout.php)
│   Source React : /Checkout.tsx
│   Widgets : Checkout Form, Order Summary
│   Définir comme : Page checkout WooCommerce
│
├── ✅ Confirmation de commande (create-order-confirmation.php)
│   Source React : /OrderConfirmation.tsx
│   Widgets : Order Confirmation
│
└── 📦 Template Produit (create-product-template.php)
    Source React : /ProductDetail.tsx
    Widgets : Product Gallery, Product Info, Product Features, Product Tabs, Related Products
    Assigner via : Elementor Theme Builder → Single Product
```

### Templates Elementor

```
Templates Elementor
│
├── 🎨 Header (create-header.php)
│   Widgets : Header Logo, Header Search, Nav Menu
│   Assigner : Tout le site via Elementor Theme Builder
│
├── 🎨 Footer (create-footer.php)
│   Widgets : Footer Logo, Nav Menu (x2), Text Editor
│   Assigner : Tout le site via Elementor Theme Builder
│
└── 🎨 Single Product (create-product-template.php)
    Widgets : Product Gallery, Product Info, Product Features, Product Tabs, Related
    Assigner : Tous les produits WooCommerce
```

---

## 🎨 CHARTE GRAPHIQUE

### Couleurs principales

| Nom             | Code HEX  | Usage                                    |
|-----------------|-----------|------------------------------------------|
| Or Digital Kappa| `#d2a30b` | Éléments clés, CTAs, accents             |
| Or foncé        | `#b8900a` | Hover sur boutons dorés                  |
| Noir principal  | `#1a1a1a` | Titres, textes importants                |
| Gris foncé      | `#2b2d31` | Fonds sombres, sections alternées        |
| Gris moyen      | `#364153` | Textes secondaires                       |
| Gris clair      | `#9ca3af` | Textes footer, infos secondaires         |
| Blanc           | `#ffffff` | Arrière-plans principaux                 |
| Gris bg         | `#f9fafb` | Arrière-plans sections alternées         |
| Vert check      | `#10b981` | Icônes Check (features)                  |
| Bleu info       | `#3b82f6` | Icônes Info (prérequis)                  |

### Typographies

**Montserrat (Sans-serif)** - Textes courants
- Regular (400) : Paragraphes
- Medium (500) : Sous-titres
- SemiBold (600) : Boutons, labels
- Bold (700) : Éléments importants

**Merriweather (Serif)** - Titres
- Regular (400) : Titres secondaires
- Bold (700) : Titres principaux (H1, H2)

### Reproduction des styles globaux

**Fichier source :** `/styles/globals.css` du projet React (branch main)

**Fichier destination :** `/assets/css/digital-kappa-styles.css` du thème WordPress

**⚠️ RÈGLE ABSOLUE :** Copier EXACTEMENT tous les styles de `globals.css`.

---

## 🧩 WIDGETS ELEMENTOR CUSTOM À CRÉER

### Approche : Widgets avec valeurs par défaut = données React

**Chaque widget doit avoir les textes, images et données EXACTS du React en valeurs par défaut.**

### Liste complète des 23 widgets obligatoires

#### 1. Hero Section (`dk_hero_section`)

**Fichier :** `/elementor-widgets/class-hero-section.php`

**Contrôles Elementor :**
- `title` : Titre H1 (default: texte exact du React)
- `description_1` : Premier paragraphe (default: texte exact du React)
- `description_2` : Deuxième paragraphe (default: texte exact du React)
- `cta_text` : Texte bouton (default: "Découvrir nos produits")
- `cta_link` : Lien bouton (default: "/produits")
- `hero_image` : Image (default: URL Unsplash exacte du React)

**Rendu HTML :**
- Grid 2 colonnes (60/40)
- Colonne gauche : Titre + Descriptions + CTA
- Colonne droite : Image
- Classes Tailwind exactes du React

---

#### 2. Features Section (`dk_features_section`)

**Fichier :** `/elementor-widgets/class-features-section.php`

**Contrôles Elementor :**
- `title` : Titre section (default: "Pourquoi nous choisir ?")
- `features` : Repeater avec 3 items (Download, Shield, Zap)
  - `icon` : Choix icône
  - `title` : Titre feature
  - `description` : Description feature

**Rendu HTML :**
- Background : `#f9fafb`
- Grid 3 colonnes (desktop), 1 colonne (mobile)
- Icônes + Titre + Description
- Textes EXACTS du React en default

---

#### 3. Stats Section (`dk_stats_section`)

**Fichier :** `/elementor-widgets/class-stats-section.php`

**Contrôles Elementor :**
- `stat_1_number` : "500+" (default)
- `stat_1_text` : "Produits disponibles" (default)
- `stat_2_number` : "50k+" (default)
- `stat_2_text` : "Clients satisfaits" (default)
- `stat_3_number` : "4.8/5" (default)
- `stat_3_text` : "Note moyenne" (default)

**Rendu HTML :**
- Grid 3 colonnes
- Nombre grand + Texte petit
- Couleur dorée pour les nombres

---

#### 4. Product Grid (`dk_product_grid`)

**Fichier :** `/elementor-widgets/class-product-grid.php`

**Contrôles Elementor :**
- `title` : Titre section
- `products_type` : Type (featured, recent, category)
- `category` : Si type = category
- `posts_per_page` : Nombre de produits (default: 6)
- `columns` : Nombre de colonnes (default: 3)

**Rendu HTML :**
- Query WooCommerce selon les paramètres
- Grid responsive
- Cards produits avec Product Card widget

---

#### 5. Process Section (`dk_process_section`)

**Fichier :** `/elementor-widgets/class-process-section.php`

**Contrôles Elementor :**
- `title` : Titre section
- `steps` : Repeater avec 4 étapes
  - `number` : Numéro (1, 2, 3, 4)
  - `icon` : Icône
  - `title` : Titre étape
  - `description` : Description

**Rendu HTML :**
- Timeline verticale avec connecteurs
- Cercles dorés numérotés
- Icônes + Titres + Descriptions (textes EXACTS du React)

---

#### 6. Testimonials (`dk_testimonials`)

**Fichier :** `/elementor-widgets/class-testimonials.php`

**Contrôles Elementor :**
- `title` : Titre section
- `testimonials` : Repeater avec 3 témoignages
  - `name` : Nom
  - `role` : Rôle/Entreprise
  - `photo` : Photo (URL)
  - `rating` : Note (1-5)
  - `text` : Témoignage

**Rendu HTML :**
- Background : `#f9fafb`
- Carousel avec 3 témoignages
- Photo + Nom + Note + Texte
- Données EXACTES du React en default

---

#### 7. FAQ Accordion (`dk_faq_accordion`)

**Fichier :** `/elementor-widgets/class-faq-accordion.php`

**Contrôles Elementor :**
- `title` : Titre section
- `faq_items` : Repeater avec questions/réponses
  - `question` : Question
  - `answer` : Réponse (WYSIWYG)

**Rendu HTML :**
- Accordéon JavaScript
- Border doré, arrondi
- Icône ChevronDown
- Questions/Réponses EXACTES du React en default

---

#### 8. CTA Section (`dk_cta_section`)

**Fichier :** `/elementor-widgets/class-cta-section.php`

**Contrôles Elementor :**
- `title` : Titre CTA
- `subtitle` : Sous-titre
- `cta_text` : Texte bouton
- `cta_link` : Lien bouton
- `background_color` : Couleur fond (default: #2b2d31)

**Rendu HTML :**
- Background sombre
- Titre blanc centré
- Bouton outline doré
- Textes EXACTS du React

---

#### 9. Page Header (`dk_page_header`)

**Fichier :** `/elementor-widgets/class-page-header.php`

**Contrôles Elementor :**
- `title` : Titre H1
- `subtitle` : Sous-titre
- `breadcrumb` : Afficher breadcrumb (true/false)

**Rendu HTML :**
- Breadcrumb si activé
- Titre H1 centré
- Sous-titre centré
- Padding vertical

---

#### 10. Process Steps (`dk_process_steps`)

**Fichier :** `/elementor-widgets/class-process-steps.php`

**Contrôles Elementor :**
- `steps` : Repeater avec étapes
  - `number` : Numéro
  - `icon` : Icône
  - `title` : Titre
  - `description` : Description

**Rendu HTML :**
- Timeline verticale
- Cercles numérotés dorés
- Données EXACTES du React

---

#### 11. Product Filters (`dk_product_filters`)

**Fichier :** `/elementor-widgets/class-product-filters.php`

**Contrôles Elementor :**
- `show_categories` : Afficher filtres catégories
- `show_price` : Afficher filtre prix
- `show_rating` : Afficher filtre note

**Rendu HTML :**
- Sidebar filtres
- Checkboxes catégories
- Slider prix (min-max)
- Filtres note (étoiles)
- Bouton "Réinitialiser"

---

#### 12. Product Listing (`dk_product_listing`)

**Fichier :** `/elementor-widgets/class-product-listing.php`

**Contrôles Elementor :**
- `columns` : Nombre de colonnes (default: 3)
- `posts_per_page` : Produits par page (default: 12)
- `show_sorting` : Afficher tri

**Rendu HTML :**
- Barre d'outils (tri, résultats)
- Grid produits responsive
- Pagination WooCommerce

---

#### 13. Product Gallery (`dk_product_gallery`)

**Fichier :** `/elementor-widgets/class-product-gallery.php`

**Rendu HTML :**
- Carousel images produit (4-5 images)
- Navigation prev/next
- Thumbnails cliquables
- Lightbox au clic
- Source : WooCommerce product gallery

---

#### 14. Product Info (`dk_product_info`)

**Fichier :** `/elementor-widgets/class-product-info.php`

**Rendu HTML :**
- Titre H1 (WooCommerce)
- Prix grand doré 48px (WooCommerce)
- Rating + "(127 avis)" (ACF ou WooCommerce)
- Description courte (WooCommerce)
- Bouton "Acheter maintenant" doré full-width (WooCommerce Add to Cart)

---

#### 15. Product Features (`dk_product_features`)

**Fichier :** `/elementor-widgets/class-product-features.php`

**Rendu HTML :**
- Liste features (source : ACF `features`)
- Icônes Check vertes (#10b981)
- Liste à puces verticale
- 4 badges garanties horizontaux :
  - Download : "Téléchargement immédiat"
  - Shield : "Paiement sécurisé"
  - RefreshCw : "Satisfait ou remboursé"
  - Headphones : "Support 24/7"

---

#### 16. Product Tabs (`dk_product_tabs`)

**Fichier :** `/elementor-widgets/class-product-tabs.php`

**Rendu HTML :**
- Widget Tabs Elementor avec 4 onglets :

**Onglet 1 : Description**
- Source : WooCommerce `description`
- HTML formaté

**Onglet 2 : Ce qui est inclus**
- Source : ACF `included`
- Liste à puces avec icônes CheckCircle vertes

**Onglet 3 : Prérequis**
- Source : ACF `requirements`
- Liste à puces avec icônes Info bleues

**Onglet 4 : Avis**
- Commentaires WooCommerce
- Distribution des notes
- Formulaire ajout avis
- **FAQ produit** (source : ACF `faq`)
  - Accordéon
  - Questions/réponses

---

#### 17. Product Related (`dk_product_related`)

**Fichier :** `/elementor-widgets/class-product-related.php`

**Contrôles Elementor :**
- `title` : Titre section (default: "Produits similaires")
- `posts_per_page` : Nombre de produits (default: 4)

**Rendu HTML :**
- Query WooCommerce (même catégorie)
- Carousel 4 produits
- Navigation prev/next

---

#### 18. Checkout Form (`dk_checkout_form`)

**Fichier :** `/elementor-widgets/class-checkout-form.php`

**Rendu HTML :**
- Layout 2 colonnes (60/40)
- Colonne gauche : Formulaire facturation WooCommerce
- Colonne droite : Order Summary widget (sticky)
- Reproduction exacte de `/Checkout.tsx`

---

#### 19. Order Summary (`dk_order_summary`)

**Fichier :** `/elementor-widgets/class-order-summary.php`

**Rendu HTML :**
- Card sticky
- Image produit
- Prix détaillé (HT, TVA, TTC)
- 4 bénéfices (Download, Shield, RefreshCw, Headphones)
- Badges paiement sécurisé
- Source : WooCommerce cart

---

#### 20. Order Confirmation (`dk_order_confirmation`)

**Fichier :** `/elementor-widgets/class-order-confirmation.php`

**Rendu HTML :**
- Header confirmation (icône CheckCircle verte 80px)
- Titre H1 : "Commande confirmée !"
- Badge doré : "Commande n° [order_number]"
- Layout 2 colonnes (66/33)
- **Colonne gauche :**
  - Email de confirmation (card)
  - Produits commandés (bouton Télécharger)
  - Prochaines étapes (timeline 1-2-3)
- **Colonne droite :**
  - Récapitulatif (card)
  - Support (card)
  - Garanties (card)
  - Bouton "Retour à l'accueil"
- Section CTA finale
- Reproduction exacte de `/OrderConfirmation.tsx`

---

#### 21. Header Logo (`dk_header_logo`)

**Fichier :** `/elementor-widgets/class-header-logo.php`

**Rendu HTML :**
- Logo `logo-digital-kappa.svg` coloré
- Texte "Digital Kappa"
- Sous-titre "PRODUITS DIGITAUX PREMIUM" (10px, doré, tracking-wide)
- Lien vers home

---

#### 22. Header Search (`dk_header_search`)

**Fichier :** `/elementor-widgets/class-header-search.php`

**Rendu HTML :**
- Input text avec placeholder "Rechercher un produit..."
- Icône Search (SVG)
- Container résultats AJAX (hidden par défaut)
- Autocomplete après 2 caractères
- Debounce 300ms
- Affichage : Image + Nom + Prix (doré)

---

#### 23. Footer Logo (`dk_footer_logo`)

**Fichier :** `/elementor-widgets/class-footer-logo.php`

**Rendu HTML :**
- Logo `logo-digital-kappa.svg` **blanc** (CSS `filter: brightness(0) invert(1)`)
- Texte "Votre marketplace de produits digitaux premium"
- Lien vers home

---

## 📄 CRÉATION DES PAGES EN PHP

### Exemple complet : Page d'accueil

**Fichier :** `/inc/pages/create-homepage.php`

```php
<?php
function dk_create_homepage() {
    // Vérifier si la page existe déjà
    $existing_page = get_page_by_path('accueil');
    if ($existing_page) {
        return $existing_page->ID;
    }
    
    // Créer la page WordPress
    $page_id = wp_insert_post(array(
        'post_title' => 'Accueil',
        'post_name' => 'accueil',
        'post_status' => 'publish',
        'post_type' => 'page'
    ));
    
    if (!$page_id) {
        return false;
    }
    
    // Activer Elementor pour cette page
    update_post_meta($page_id, '_elementor_edit_mode', 'builder');
    update_post_meta($page_id, '_elementor_template_type', 'wp-page');
    update_post_meta($page_id, '_wp_page_template', 'elementor_header_footer');
    
    // Construire la structure Elementor avec les widgets custom
    $elementor_data = array(
        // Section 1 : Hero
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_hero_section',
                            'settings' => array(
                                // Les valeurs par défaut du widget sont déjà les textes exacts du React
                                // On peut les surcharger ici si besoin
                            )
                        )
                    )
                )
            )
        ),
        
        // Section 2 : Features
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'settings' => array(
                'background_background' => 'classic',
                'background_color' => '#f9fafb'
            ),
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_features_section',
                            'settings' => array()
                        )
                    )
                )
            )
        ),
        
        // Section 3 : Stats
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_stats_section',
                            'settings' => array()
                        )
                    )
                )
            )
        ),
        
        // Section 4 : Produits vedettes
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_product_grid',
                            'settings' => array(
                                'title' => 'Nos produits les plus populaires',
                                'products_type' => 'featured',
                                'posts_per_page' => 6,
                                'columns' => 3
                            )
                        )
                    )
                )
            )
        ),
        
        // Section 5 : Process
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_process_section',
                            'settings' => array()
                        )
                    )
                )
            )
        ),
        
        // Section 6 : Témoignages
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'settings' => array(
                'background_background' => 'classic',
                'background_color' => '#f9fafb'
            ),
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_testimonials',
                            'settings' => array()
                        )
                    )
                )
            )
        ),
        
        // Section 7 : FAQ
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_faq_accordion',
                            'settings' => array()
                        )
                    )
                )
            )
        ),
        
        // Section 8 : CTA Final
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'settings' => array(
                'background_background' => 'classic',
                'background_color' => '#2b2d31'
            ),
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_cta_section',
                            'settings' => array()
                        )
                    )
                )
            )
        )
    );
    
    // Enregistrer la structure Elementor
    update_post_meta($page_id, '_elementor_data', wp_slash(wp_json_encode($elementor_data)));
    
    // Définir comme page d'accueil
    update_option('page_on_front', $page_id);
    update_option('show_on_front', 'page');
    
    return $page_id;
}
```

**⚠️ IMPORTANT :** Créer un fichier similaire pour CHAQUE page (10 fichiers au total).

---

## 🛍️ IMPORT AUTOMATIQUE DES PRODUITS

### Fichier CSV

**Emplacement :** `/data/products-import.csv`

**Structure CSV :**

```csv
ID,Type,SKU,Name,Published,Is featured?,Short description,Description,Categories,Images,Regular price,Sale price,Meta: features,Meta: included,Meta: requirements,Meta: faq,Meta: rating,Meta: review_count
```

### Métadonnées ACF

**4 champs repeater obligatoires :**

1. **`features`** - Fonctionnalités principales
   - Format CSV : `Feature 1|Feature 2|Feature 3|Feature 4`
   - Affichage : Liste à puces avec Check verts (#10b981)

2. **`included`** - Ce qui est inclus
   - Format CSV : `Item 1|Item 2|Item 3|Item 4`
   - Affichage : Onglet avec CheckCircle verts

3. **`requirements`** - Prérequis
   - Format CSV : `Req 1|Req 2|Req 3`
   - Affichage : Onglet avec Info bleus (#3b82f6)

4. **`faq`** - FAQ produit
   - Format CSV : `Question 1::Réponse 1||Question 2::Réponse 2`
   - Affichage : Accordéon dans onglet Avis

---

## 🎛️ MENUS WORDPRESS

### 3 menus à créer automatiquement

**1. Menu Header** (`header-menu`)
- Accueil
- Tous nos produits
- Ebooks (catégorie)
- Applications (catégorie)
- Templates (catégorie)
- FAQ
- Comment ça marche

**2. Menu Footer Catégories** (`footer-categories`)
- Applications
- Ebooks
- Templates

**3. Menu Footer Légal** (`footer-legal`)
- À propos
- Conditions générales de vente
- Politique de confidentialité

---

## 📦 STRUCTURE DU THÈME & PLUGIN

```
digital-kappa-theme/
├── style.css
├── functions.php
├── screenshot.png
│
├── elementor-widgets/
│   ├── class-hero-section.php
│   ├── class-features-section.php
│   ├── class-stats-section.php
│   ├── class-product-grid.php
│   ├── class-process-section.php
│   ├── class-testimonials.php
│   ├── class-faq-accordion.php
│   ├── class-cta-section.php
│   ├── class-page-header.php
│   ├── class-process-steps.php
│   ├── class-product-filters.php
│   ├── class-product-listing.php
│   ├── class-product-gallery.php
│   ├── class-product-info.php
│   ├── class-product-features.php
│   ├── class-product-tabs.php
│   ├── class-product-related.php
│   ├── class-checkout-form.php
│   ├── class-order-summary.php
│   ├── class-order-confirmation.php
│   ├── class-header-logo.php
│   ├── class-header-search.php
│   └── class-footer-logo.php
│
├── inc/
│   ├── theme-setup.php
│   ├── elementor-setup.php
│   └── woocommerce-config.php
│
├── assets/
│   ├── css/
│   │   └── digital-kappa-styles.css
│   ├── js/
│   │   ├── custom-scripts.js
│   │   └── search-autocomplete.js
│   └── images/
│       └── logo-digital-kappa.svg
│
└── data/
    └── products-import.csv

digital-kappa-setup/ (plugin)
├── digital-kappa-setup.php
├── inc/
│   ├── pages/
│   │   ├── create-homepage.php
│   │   ├── create-how-it-works.php
│   │   ├── create-faq.php
│   │   ├── create-about.php
│   │   ├── create-cgv.php
│   │   ├── create-privacy.php
│   │   ├── create-all-products.php
│   │   ├── create-checkout.php
│   │   ├── create-order-confirmation.php
│   │   └── create-product-template.php
│   ├── create-header.php
│   ├── create-footer.php
│   ├── create-menus.php
│   ├── import-products.php
│   └── woocommerce-setup.php
```

---

## ⚙️ PLUGIN D'ACTIVATION

**Nom :** Digital Kappa Setup  
**Fichier :** `digital-kappa-setup.php`

### Actions à l'activation

```php
register_activation_hook(__FILE__, 'dk_auto_setup');

function dk_auto_setup() {
    // 1. Créer toutes les pages
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-homepage.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-how-it-works.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-faq.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-about.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-cgv.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-privacy.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-all-products.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-checkout.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-order-confirmation.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-product-template.php';
    
    dk_create_homepage();
    dk_create_how_it_works_page();
    dk_create_faq_page();
    dk_create_about_page();
    dk_create_cgv_page();
    dk_create_privacy_page();
    dk_create_all_products_page();
    dk_create_checkout_page();
    dk_create_order_confirmation_page();
    dk_create_product_template();
    
    // 2. Créer Header/Footer
    require_once plugin_dir_path(__FILE__) . 'inc/create-header.php';
    require_once plugin_dir_path(__FILE__) . 'inc/create-footer.php';
    
    dk_create_header();
    dk_create_footer();
    
    // 3. Import Produits
    require_once plugin_dir_path(__FILE__) . 'inc/import-products.php';
    dk_import_products();
    
    // 4. Créer Menus
    require_once plugin_dir_path(__FILE__) . 'inc/create-menus.php';
    dk_create_menus();
    
    // 5. Configurer WooCommerce
    require_once plugin_dir_path(__FILE__) . 'inc/woocommerce-setup.php';
    dk_setup_woocommerce();
    
    // 6. Message de succès
    set_transient('dk_setup_complete', true, 60);
}
```

---

## 🚀 CHECKLIST DE LIVRAISON

### Widgets Elementor custom
- [ ] 23 widgets créés
- [ ] Valeurs par défaut = textes EXACTS du React
- [ ] Valeurs par défaut = images EXACTES du React (URLs)
- [ ] Catégorie "Digital Kappa"
- [ ] Widgets configurables après création

### Pages créées en PHP
- [ ] 10 pages créées en PHP avec structure Elementor
- [ ] Textes copiés du React (valeurs default des widgets)
- [ ] Images du React (valeurs default des widgets)
- [ ] Ordre des sections EXACT
- [ ] Pages visibles immédiatement
- [ ] Pages éditables avec Elementor

### Logo
- [ ] `logo-digital-kappa.svg` dans `/assets/images/`
- [ ] Logo coloré header
- [ ] Logo blanc footer (CSS filter)

### Import produits
- [ ] 13 produits créés
- [ ] Images uploadées
- [ ] Métadonnées ACF remplies

### Header & Footer
- [ ] Header créé avec Theme Builder
- [ ] Footer créé avec Theme Builder
- [ ] Widgets custom utilisés
- [ ] Modifiables visuellement

### Menus
- [ ] 3 menus créés
- [ ] Items ajoutés
- [ ] Menus éditables

### Styles
- [ ] `digital-kappa-styles.css` = copie `globals.css`
- [ ] Tailwind CSS chargé
- [ ] Google Fonts chargées
- [ ] Couleurs exactes

---

## 🎯 CRITÈRES DE RÉUSSITE

✅ **Création automatique** : Site 100% opérationnel après activation du plugin

✅ **Widgets avec defaults** : Tous les widgets ont les textes/images exacts du React en valeurs par défaut

✅ **Pages visibles** : Toutes les pages visibles et éditables immédiatement

✅ **Reproduction pixel-perfect** : Textes/Images/Sections identiques au React

✅ **Édition Elementor** : 100% modifiable visuellement après création

✅ **Menus WordPress** : Éditables depuis l'admin

✅ **Logo unique** : `logo-digital-kappa.svg` (blanc en CSS)

---

**Site livré clé en main, prêt à vendre des produits digitaux immédiatement après activation du plugin.**

---

**Version finale - Décembre 2024**
