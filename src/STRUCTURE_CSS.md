# 📁 Structure CSS - Digital Kappa

## 🎯 Organisation des fichiers

Le projet utilise une **architecture CSS modulaire** avec un fichier CSS dédié pour chaque page et composant.

---

## 📂 Arborescence

```
/styles/
├── globals.css                    # Variables, typographie, utilitaires globaux
├── components/
│   ├── Header.css                 # Header avec logo, navigation, recherche
│   ├── Footer.css                 # Footer avec liens, logo blanc
│   └── ProductCard.css            # Carte produit réutilisable
└── pages/
    ├── HomePage.css               # Page d'accueil (hero, features, stats, testimonials, FAQ, CTA)
    ├── AllProducts.css            # Page catalogue (filtres, grille, pagination)
    ├── ProductDetail.css          # Page détail produit (galerie, infos, tabs, reviews)
    ├── Checkout.css               # Page commande (formulaire, résumé)
    ├── OrderConfirmation.css      # Page confirmation (récap, téléchargements, support)
    ├── HowItWorks.css             # Page "Comment ça marche" (étapes, garanties)
    ├── FAQ.css                    # Page FAQ (accordéon, recherche, catégories)
    └── LegalPages.css             # Pages légales (CGV, Confidentialité, À propos)
```

---

## 📄 Description des fichiers

### `globals.css` - Styles globaux

**Contenu :**
- ✅ Variables CSS (couleurs, typographies)
- ✅ Typographie de base (h1-h6, p, labels, inputs)
- ✅ Classes utilitaires (boutons, badges, formulaires)
- ✅ Animations
- ✅ Styles responsives

**Usage :**
```tsx
import '../styles/globals.css';
```

---

### `components/Header.css` - Header

**Classes principales :**
- `.header-dk` : Container principal sticky
- `.logo-container` : Logo + texte "Digital Kappa"
- `.logo-subtitle` : "PRODUITS DIGITAUX PREMIUM" (10px, doré)
- `.nav-link-dk` : Liens de navigation
- `.search-container` : Barre de recherche
- `.mobile-menu` : Menu responsive mobile

**Composant React :**
```tsx
import '../styles/components/Header.css';
```

---

### `components/Footer.css` - Footer

**Classes principales :**
- `.footer-dk` : Container principal (fond noir)
- `.footer-logo` : Logo blanc (via CSS filter)
- `.footer-column` : Colonnes de liens
- `.footer-bottom` : Copyright

**Composant React :**
```tsx
import '../styles/components/Footer.css';
```

---

### `components/ProductCard.css` - Carte produit

**Classes principales :**
- `.card-dk-product` : Container principal
- `.product-image-container` : Image aspect ratio 4:3
- `.product-badge` : Badge "Nouveau" / "Best-seller"
- `.product-category` : Tag catégorie
- `.product-title` : Titre produit
- `.product-rating` : Note avec étoiles
- `.product-price` : Prix doré
- `.product-cta` : Bouton "Voir le produit"

**Composant React :**
```tsx
import '../styles/components/ProductCard.css';
```

---

### `pages/HomePage.css` - Page d'accueil

**Sections :**
1. **Hero Section** (`.hero-section-dk`) : Badge, titre, description, 2 boutons, grille d'images
2. **Features Section** (`.features-section-dk`) : 3 features (Download, Shield, Zap)
3. **Stats Section** (`.stats-section-dk`) : 3 statistiques (500+, 50k+, 4.8/5)
4. **Products Section** (`.products-section-dk`) : Grille 3 colonnes de produits
5. **Process Section** (`.process-section-dk`) : 4 étapes avec timeline
6. **Testimonials Section** (`.testimonials-section-dk`) : 3 témoignages
7. **FAQ Section** (`.faq-section-dk`) : Accordéon FAQ
8. **CTA Section** (`.cta-section-dk`) : CTA final fond sombre

**Page React :**
```tsx
import '../styles/pages/HomePage.css';
```

---

### `pages/AllProducts.css` - Page catalogue

**Sections :**
1. **Page Header** (`.products-page-header`) : Breadcrumb, titre, description
2. **Sidebar Filters** (`.products-sidebar`) : Filtres catégories, prix, note
3. **Toolbar** (`.products-toolbar`) : Tri, nombre de résultats, vue grille/liste
4. **Products Grid** (`.products-grid`) : Grille responsive 3 colonnes
5. **Pagination** (`.products-pagination`) : Navigation pages

**Features :**
- Filtres catégories (checkboxes)
- Filtre prix (range slider)
- Filtre note (étoiles)
- Bouton "Réinitialiser"
- Tri (popularité, prix, note)
- Vue grille/liste
- Mobile : Bouton filtres flottant + panneau slide-in

**Page React :**
```tsx
import '../styles/pages/AllProducts.css';
```

---

### `pages/ProductDetail.css` - Page produit

**Sections :**
1. **Gallery** (`.product-gallery`) : Carousel 4-5 images + thumbnails + lightbox
2. **Product Info** (`.product-info`) : Titre, prix, rating, description, CTA
3. **Features** (`.product-features`) : Liste features avec checks verts
4. **Guarantees** (`.product-guarantees`) : 4 badges (Download, Shield, RefreshCw, Headphones)
5. **Tabs** (`.product-tabs-section`) :
   - Description
   - Ce qui est inclus (CheckCircle verts)
   - Prérequis (Info bleus)
   - Avis + FAQ produit
6. **Related Products** (`.related-products-section`) : Carousel 4 produits

**Page React :**
```tsx
import '../styles/pages/ProductDetail.css';
```

---

### `pages/Checkout.css` - Page commande

**Layout :**
- **Grid 2 colonnes** (66/33)
- **Colonne gauche** : Formulaire facturation
- **Colonne droite** : Résumé commande (sticky)

**Sections :**
1. **Formulaire** (`.checkout-form-section`) : Infos client, livraison, paiement
2. **Moyens de paiement** (`.payment-methods`) : Cartes, PayPal
3. **Résumé** (`.order-summary-card`) : Produit, prix HT/TVA/TTC, garanties
4. **Bouton** (`.checkout-submit-button`) : "Passer la commande"

**Page React :**
```tsx
import '../styles/pages/Checkout.css';
```

---

### `pages/OrderConfirmation.css` - Page confirmation

**Sections :**
1. **Header** (`.confirmation-header`) : Icône CheckCircle verte (80px), titre, badge numéro commande
2. **Email envoyé** (`.email-sent-info`) : Notification email de confirmation
3. **Produits** (`.order-products-list`) : Liste produits avec bouton "Télécharger"
4. **Prochaines étapes** (`.next-steps`) : Timeline 3 étapes
5. **Sidebar** :
   - Récapitulatif commande (`.order-summary-recap`)
   - Support (`.support-card`)
   - Garanties (`.guarantees-card`)
6. **CTA final** (`.confirmation-cta`) : "Besoin d'autre chose ?"

**Page React :**
```tsx
import '../styles/pages/OrderConfirmation.css';
```

---

### `pages/HowItWorks.css` - Comment ça marche

**Sections :**
1. **Page Header** (`.how-it-works-header`) : Titre + description
2. **Steps** (`.steps-section`) : 3 grandes étapes alternées gauche/droite
3. **Benefits** (`.benefits-section`) : 3 bénéfices
4. **Guarantees** (`.guarantees-section`) : 3 garanties
5. **CTA** (`.how-it-works-cta`) : CTA final

**Page React :**
```tsx
import '../styles/pages/HowItWorks.css';
```

---

### `pages/FAQ.css` - FAQ

**Sections :**
1. **Page Header** (`.faq-page-header`) : Titre + description
2. **Search** (`.faq-search-section`) : Barre de recherche + catégories
3. **FAQ Accordion** (`.faq-accordion`) : Questions/réponses pliables
4. **Help Section** (`.faq-help-section`) : "Besoin d'aide ?" + boutons contact
5. **Quick Links** (`.faq-quick-links`) : 3 liens rapides

**Page React :**
```tsx
import '../styles/pages/FAQ.css';
```

---

### `pages/LegalPages.css` - Pages légales

**Utilisé pour :**
- About.tsx
- TermsOfSale.tsx
- PrivacyPolicy.tsx

**Sections :**
1. **Page Header** (`.legal-page-header`) : Breadcrumb + titre + date de mise à jour
2. **Content** (`.legal-page-content`) : Contenu prose (h2, h3, p, ul, tables)
3. **Contact** (`.legal-contact-section`) : Section contact finale

**Styles typographiques :**
- h2 avec border-bottom
- h3, h4
- Listes (ul, ol)
- Liens
- Blockquotes
- Tables
- Info/Warning boxes

**Pages React :**
```tsx
import '../styles/pages/LegalPages.css';
```

---

## 🎨 Système de design

### Variables CSS (dans `globals.css`)

```css
/* Couleurs de la marque */
--dk-gold: #d2a30b;
--dk-gold-hover: #b8900a;
--dk-gold-light: #fffbf0;

/* Couleurs de texte */
--dk-text-primary: #1a1a1a;
--dk-text-secondary: #4a5565;

/* Couleurs de fond */
--dk-bg-dark: #2b2d31;
--dk-bg-light: #f9fafb;
--dk-bg-gray: #f0f2f5;

/* Typographie */
--dk-font-heading: 'Merriweather', serif;
--dk-font-body: 'Montserrat', sans-serif;
```

### Typographie standardisée

| Élément | Police | Taille | Poids | Usage |
|---------|--------|--------|-------|-------|
| h1 | Merriweather | 48px (36px mobile) | 500 | Titres principaux |
| h2 | Merriweather | 32px (28px mobile) | 500 | Titres sections |
| h3 | Merriweather | 24px (20px mobile) | 500 | Sous-titres |
| p | Montserrat | 16px | 400 | Paragraphes |
| button | Montserrat | 16px | 500 | Boutons |

---

## 🚀 Avantages de cette structure

### ✅ Pour le développement React
1. **Import clair** : Un fichier CSS par page
2. **Maintenabilité** : Facile de retrouver les styles d'une page
3. **Performance** : CSS code-splitting automatique
4. **Pas de conflits** : Nommage cohérent avec préfixe `-dk`

### ✅ Pour la conversion WordPress
1. **Mapping direct** : 1 fichier CSS = 1 widget Elementor
2. **Copier-coller facile** : Toutes les classes sont déjà définies
3. **Documentation claire** : Chaque fichier = une section du site
4. **Réutilisabilité** : Les classes peuvent être copiées telles quelles dans les widgets PHP

---

## 📋 Checklist de conversion WordPress

Pour chaque page, Claude Code doit :

### Étape 1 : Identifier le fichier CSS correspondant
- HomePage.tsx → `pages/HomePage.css`
- AllProducts.tsx → `pages/AllProducts.css`
- etc.

### Étape 2 : Copier les classes CSS
- Copier les styles de `.hero-section-dk`, `.features-section-dk`, etc.
- Les intégrer dans les widgets Elementor

### Étape 3 : Créer les widgets Elementor
- 1 widget par section principale
- Utiliser les mêmes classes CSS
- Ajouter les contrôles Elementor pour les contenus éditables

### Étape 4 : Valider la structure HTML
- Vérifier que le HTML du widget = HTML du composant React
- Vérifier les noms de classes
- Vérifier les images (Unsplash URLs)

---

## 🔍 Exemple de conversion

### React (HomePage.tsx)
```tsx
import '../styles/pages/HomePage.css';

export function HomePage() {
  return (
    <div>
      <section className="hero-section-dk">
        <div className="container-dk">
          <div className="hero-content">
            <span className="hero-badge">Nouveau</span>
            <h1>Titre hero</h1>
            ...
          </div>
        </div>
      </section>
    </div>
  );
}
```

### WordPress Widget
```php
class DK_Hero_Section extends \Elementor\Widget_Base {
  
  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
    <section class="hero-section-dk">
      <div class="container-dk">
        <div class="hero-content">
          <span class="hero-badge"><?php echo $settings['badge_text']; ?></span>
          <h1><?php echo $settings['title']; ?></h1>
          ...
        </div>
      </div>
    </section>
    <?php
  }
  
  // Styles inline ou fichier CSS séparé
  public function get_style_depends() {
    return ['homepage-styles']; // Charge HomePage.css
  }
}
```

---

## 📦 Fichiers à fournir à Claude Code

### Pour la conversion WordPress

**Documents de référence :**
1. ✅ `PROMPT_CLAUDE_CODE_FINAL.md` - Instructions techniques
2. ✅ `CAHIER_DES_CHARGES_WORDPRESS_FINAL.md` - Spécifications fonctionnelles
3. ✅ `STRUCTURE_CSS.md` - Ce fichier (guide CSS)

**Fichiers source React :**
- `/styles/globals.css`
- `/styles/components/*.css`
- `/styles/pages/*.css`
- Tous les fichiers `.tsx` des pages

**Données produits :**
- `/data/products.ts`
- `/woocommerce-products-import.csv`

---

## 💡 Notes importantes

### Classes CSS réutilisables (globals.css)

```css
/* Boutons */
.btn-dk-primary          /* Bouton doré */
.btn-dk-secondary        /* Bouton outline doré */
.btn-dk-dark             /* Bouton fond sombre */

/* Containers */
.container-dk            /* Max-width 7xl */
.container-dk-narrow     /* Max-width 4xl */
.container-dk-wide       /* Max-width 6xl */

/* Badges */
.badge-dk-gold           /* Badge doré */
.badge-dk-light          /* Badge outline doré */

/* Formulaires */
.input-dk                /* Input standard */
.textarea-dk             /* Textarea */
.label-dk                /* Label */
```

Ces classes sont **globales** et doivent être utilisées partout où c'est possible pour **garantir la cohérence**.

---

**🎯 Objectif final :** Conversion pixel-perfect du React vers WordPress en utilisant cette structure CSS comme référence exacte.
