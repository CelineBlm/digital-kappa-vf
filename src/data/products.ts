export interface Product {
  id: string;
  image: string;
  images?: string[]; // Carrousel d'images
  category: 'Ebook' | 'Application' | 'Template';
  title: string;
  description: string;
  price: string;
  rating: number;
  reviewCount: number;
  longDescription: string;
  features: string[];
  includes: string[];
  prerequisites: string[];
}

export const products: Product[] = [
  {
    id: 'guide-dev-moderne',
    image: 'figma:asset/744f2d0dba28454e218a40daea3278bcd1cbb92a.png',
    images: [
      'figma:asset/744f2d0dba28454e218a40daea3278bcd1cbb92a.png',
      'https://images.unsplash.com/photo-1675495277087-10598bf7bcd1?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcm9ncmFtbWluZyUyMGNvZGUlMjBsYXB0b3B8ZW58MXx8fHwxNzY1MjkxNjY0fDA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1707528041466-83a325f01a3c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxkZXZlbG9wZXIlMjB3b3Jrc3BhY2V8ZW58MXx8fHwxNzY1MzgwMTQxfDA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1515879218367-8466d910aaa4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb2RpbmclMjBzY3JlZW58ZW58MXx8fHwxNzY1MzczMDQ0fDA&ixlib=rb-4.1.0&q=80&w=1080'
    ],
    category: 'Ebook',
    title: 'Guide du développeur moderne',
    description: 'Ebook complet pour maîtriser les outils et pratiques du développement moderne. 250+ pages de contenu pratique.',
    price: '59 €',
    rating: 4.8,
    reviewCount: 127,
    longDescription: 'Guide complet de 250+ pages couvrant les outils, pratiques et méthodologies du développement moderne. Des bases aux techniques avancées, avec exemples pratiques et projets réels.',
    features: [
      '250+ pages de contenu',
      '10 chapitres détaillés',
      'Exemples de code pratiques',
      'Projets réels inclus',
      'Formats PDF, EPUB, MOBI',
      'Mises à jour gratuites à vie',
      'Ressources téléchargeables',
      'Accès à la communauté'
    ],
    includes: [
      'Ebook complet (PDF, EPUB, MOBI)',
      'Code source des exemples',
      'Fiches récapitulatives PDF',
      'Accès communauté Discord',
      'Mises à jour gratuites'
    ],
    prerequisites: [
      'Connaissances de base en programmation',
      'Motivation pour apprendre'
    ]
  },
  {
    id: 'design-system-pro',
    image: 'https://images.unsplash.com/photo-1698440050363-1697e5f0277c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxkZXNpZ24lMjBzeXN0ZW0lMjBjb21wb25lbnRzfGVufDF8fHx8MTc2NTMxMzY3Mnww&ixlib=rb-4.1.0&q=80&w=1080',
    images: [
      'https://images.unsplash.com/photo-1698440050363-1697e5f0277c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxkZXNpZ24lMjBzeXN0ZW0lMjBjb21wb25lbnRzfGVufDF8fHx8MTc2NTMxMzY3Mnww&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1699040309386-11c615ed64d5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx1aSUyMGRlc2lnbiUyMGludGVyZmFjZXxlbnwxfHx8fDE3NjUyOTQzMDd8MA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1738606410165-46da2b5b700e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxkZXNpZ24lMjB0b2tlbnMlMjBjb2xvcnN8ZW58MXx8fHwxNzY1Mzk5ODU0fDA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1609921212029-bb5a28e60960?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtb2JpbGUlMjBhcHAlMjBkZXNpZ258ZW58MXx8fHwxNzY1MjkxMzQ5fDA&ixlib=rb-4.1.0&q=80&w=1080'
    ],
    category: 'Template',
    title: 'Design System Pro',
    description: 'Système de design complet avec composants React, Figma et documentation. Plus de 200 composants prêts à l\'emploi.',
    price: '149 €',
    rating: 4.9,
    reviewCount: 89,
    longDescription: 'Un système de design professionnel comprenant plus de 200 composants React configurables, fichiers Figma organisés et documentation complète. Idéal pour démarrer rapidement vos projets.',
    features: [
      '200+ composants React',
      'Fichiers Figma inclus',
      'Documentation interactive',
      'Thème personnalisable',
      'TypeScript natif',
      'Accessibilité WCAG 2.1',
      'Mode sombre intégré',
      'Support premium 6 mois'
    ],
    includes: [
      'Librairie complète de composants',
      'Fichiers Figma sources',
      'Documentation Storybook',
      'Exemples d\'intégration',
      'Support technique 6 mois',
      'Mises à jour pendant 1 an'
    ],
    prerequisites: [
      'Connaissances en React',
      'Bases de TypeScript recommandées'
    ]
  },
  {
    id: 'masterclass-ui-ux',
    image: 'https://images.unsplash.com/photo-1586717791821-3f44a563fa4c?w=800&q=80',
    images: [
      'https://images.unsplash.com/photo-1586717791821-3f44a563fa4c?w=800&q=80',
      'https://images.unsplash.com/photo-1680016661694-1cd3faf31c3a?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx1eCUyMGRlc2lnbiUyMHdpcmVmcmFtZXxlbnwxfHx8fDE3NjUzNzc2MDZ8MA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1610569171388-dd6e3d27e340?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx1c2VyJTIwaW50ZXJmYWNlJTIwc2tldGNofGVufDF8fHx8MTc2NTM5OTg1NXww&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1609921212029-bb5a28e60960?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtb2JpbGUlMjBhcHAlMjBkZXNpZ258ZW58MXx8fHwxNzY1MjkxMzQ5fDA&ixlib=rb-4.1.0&q=80&w=1080'
    ],
    category: 'Ebook',
    title: 'Masterclass UI/UX Design',
    description: 'Formation complète en design d\'interfaces et expérience utilisateur. 15 heures de contenu vidéo + workbook PDF.',
    price: '79 €',
    rating: 4.7,
    reviewCount: 203,
    longDescription: 'Formation vidéo complète sur le design UI/UX moderne. Apprenez les principes fondamentaux, les outils professionnels et les méthodologies éprouvées utilisées par les grandes entreprises tech.',
    features: [
      '15 heures de vidéo HD',
      '8 modules progressifs',
      'Workbook PDF 120 pages',
      '20 exercices pratiques',
      'Projets de portfolio',
      'Templates Figma inclus',
      'Certificat de completion',
      'Accès à vie'
    ],
    includes: [
      'Vidéos de formation complètes',
      'Workbook PDF interactif',
      'Templates et ressources',
      'Exercices corrigés',
      'Communauté privée',
      'Mises à jour futures'
    ],
    prerequisites: [
      'Aucune expérience requise',
      'Passion pour le design'
    ]
  },
  {
    id: 'app-fitness-tracker',
    image: 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=800&q=80',
    images: [
      'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=800&q=80',
      'https://images.unsplash.com/photo-1762768767074-e491f1eebdfc?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxmaXRuZXNzJTIwYXBwJTIwcGhvbmV8ZW58MXx8fHwxNzY1Mzk5ODU2fDA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1654195131868-cac1d8429d86?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx3b3Jrb3V0JTIwdHJhY2tlcnxlbnwxfHx8fDE3NjUzOTk4NTZ8MA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1609921212029-bb5a28e60960?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtb2JpbGUlMjBhcHAlMjBkZXNpZ258ZW58MXx8fHwxNzY1MjkxMzQ5fDA&ixlib=rb-4.1.0&q=80&w=1080'
    ],
    category: 'Application',
    title: 'Fitness Tracker Pro',
    description: 'Application mobile complète de suivi fitness. Code source React Native + backend Node.js avec API REST.',
    price: '199 €',
    rating: 4.6,
    reviewCount: 56,
    longDescription: 'Application mobile complète de tracking fitness avec fonctionnalités avancées : suivi d\'entraînements, nutrition, objectifs, statistiques détaillées. Code source complet pour iOS et Android.',
    features: [
      'Code React Native complet',
      'Backend Node.js + MongoDB',
      'Authentification sécurisée',
      'Tracking GPS intégré',
      'Graphiques et statistiques',
      'Push notifications',
      'Mode hors-ligne',
      'Documentation complète'
    ],
    includes: [
      'Code source complet',
      'Base de données configurée',
      'API REST documentée',
      'Design Figma',
      'Guide de déploiement',
      'Support technique 3 mois'
    ],
    prerequisites: [
      'Connaissances React/React Native',
      'Bases en Node.js',
      'Compte développeur mobile'
    ]
  },
  {
    id: 'landing-page-saas',
    image: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80',
    images: [
      'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80',
      'https://images.unsplash.com/photo-1706920102507-3f6a8ce88acb?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzYWFzJTIwd2Vic2l0ZSUyMGxhbmRpbmd8ZW58MXx8fHwxNzY1Mzk5ODU5fDA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1677469684112-5dfb3aa4d3df?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtb2Rlcm4lMjB3ZWJzaXRlJTIwZGVzaWdufGVufDF8fHx8MTc2NTMwMjQwNnww&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1637937459053-c788742455be?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx3ZWIlMjBkZXZlbG9wbWVudCUyMHNjcmVlbnxlbnwxfHx8fDE3NjUzMjkzODl8MA&ixlib=rb-4.1.0&q=80&w=1080'
    ],
    category: 'Template',
    title: 'Landing Page SaaS',
    description: 'Template de landing page moderne pour SaaS. Next.js 14, TypeScript, Tailwind CSS. 12 sections personnalisables.',
    price: '49 €',
    rating: 4.9,
    reviewCount: 312,
    longDescription: 'Template professionnel de landing page pour produits SaaS. Optimisé pour la conversion avec animations fluides, sections modulaires et design responsive parfait.',
    features: [
      '12 sections prêtes',
      'Next.js 14 + TypeScript',
      'Tailwind CSS',
      'Animations Framer Motion',
      'SEO optimisé',
      'Performance maximale',
      'Formulaires validés',
      'Multi-langue ready'
    ],
    includes: [
      'Code source complet',
      'Fichiers Figma',
      'Composants réutilisables',
      'Documentation détaillée',
      'Déploiement Vercel',
      'Mises à jour 1 an'
    ],
    prerequisites: [
      'Connaissances React/Next.js',
      'Bases Tailwind CSS'
    ]
  },
  {
    id: 'ia-marketing-guide',
    image: 'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&q=80',
    images: [
      'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&q=80',
      'https://images.unsplash.com/photo-1697577418970-95d99b5a55cf?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxhcnRpZmljaWFsJTIwaW50ZWxsaWdlbmNlJTIwdGVjaG5vbG9neXxlbnwxfHx8fDE3NjUzNDI5Njl8MA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1762968286778-60e65336d5ca?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxhaSUyMG1hcmtldGluZyUyMGRhdGF8ZW58MXx8fHwxNzY1Mzk5ODYxfDA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1599658880436-c61792e70672?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxkaWdpdGFsJTIwbWFya2V0aW5nJTIwYW5hbHl0aWNzfGVufDF8fHx8MTc2NTMyMDU4N3ww&ixlib=rb-4.1.0&q=80&w=1080'
    ],
    category: 'Ebook',
    title: 'IA pour le Marketing Digital',
    description: 'Guide pratique pour utiliser l\'IA dans vos campagnes marketing. 180 pages + 30 prompts ChatGPT prêts à l\'emploi.',
    price: '39 €',
    rating: 4.8,
    reviewCount: 167,
    longDescription: 'Découvrez comment l\'intelligence artificielle révolutionne le marketing digital. Stratégies concrètes, cas d\'usage réels et prompts optimisés pour ChatGPT, Midjourney et autres outils IA.',
    features: [
      '180 pages de contenu',
      '30 prompts ChatGPT',
      '15 cas d\'usage réels',
      'Stratégies éprouvées',
      'Templates inclus',
      'Ressources bonus',
      'Updates régulières',
      'Communauté privée'
    ],
    includes: [
      'Ebook PDF complet',
      'Bibliothèque de prompts',
      'Templates de campagnes',
      'Checklist marketing IA',
      'Accès communauté Slack',
      'Bonus vidéos'
    ],
    prerequisites: [
      'Bases en marketing digital',
      'Curiosité pour l\'IA'
    ]
  },
  {
    id: 'dashboard-admin',
    image: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=80',
    images: [
      'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=80',
      'https://images.unsplash.com/photo-1759752394755-1241472b589d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxkYXNoYm9hcmQlMjBhbmFseXRpY3MlMjBzY3JlZW58ZW58MXx8fHwxNzY1Mzg3MDMxfDA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1744782211816-c5224434614f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxkYXRhJTIwdmlzdWFsaXphdGlvbiUyMGNoYXJ0c3xlbnwxfHx8fDE3NjUzMjA1ODd8MA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1609921212029-bb5a28e60960?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtb2JpbGUlMjBhcHAlMjBkZXNpZ258ZW58MXx8fHwxNzY1MjkxMzQ5fDA&ixlib=rb-4.1.0&q=80&w=1080'
    ],
    category: 'Template',
    title: 'Dashboard Admin Pro',
    description: 'Template de tableau de bord admin complet. React + TypeScript + Chart.js. Plus de 50 pages et composants.',
    price: '129 €',
    rating: 4.7,
    reviewCount: 94,
    longDescription: 'Dashboard administratif professionnel avec plus de 50 pages préconstruites. Graphiques interactifs, tables de données avancées, formulaires validés et authentification complète.',
    features: [
      '50+ pages préconstruites',
      'React 18 + TypeScript',
      'Chart.js + Recharts',
      'Tables de données',
      'Auth complète',
      'Mode sombre',
      'Responsive design',
      'Documentation complète'
    ],
    includes: [
      'Code source complet',
      'Composants réutilisables',
      'API mock intégrée',
      'Thèmes personnalisables',
      'Guide d\'intégration',
      'Support 6 mois'
    ],
    prerequisites: [
      'Expérience React',
      'TypeScript recommandé'
    ]
  },
  {
    id: 'ecommerce-starter',
    image: 'https://images.unsplash.com/photo-1472851294608-062f824d29cc?w=800&q=80',
    images: [
      'https://images.unsplash.com/photo-1472851294608-062f824d29cc?w=800&q=80',
      'https://images.unsplash.com/photo-1658297063569-162817482fb6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxlY29tbWVyY2UlMjBvbmxpbmUlMjBzaG9wcGluZ3xlbnwxfHx8fDE3NjUzNzU0ODR8MA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1742454582165-deab666a8763?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxvbmxpbmUlMjBzdG9yZSUyMHdlYnNpdGV8ZW58MXx8fHwxNzY1Mzk5ODY2fDA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1739124794957-4667b8b74894?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzaG9wcGluZyUyMGNhcnQlMjBtb2JpbGU8ZW58MXx8fHwxNzY1MzUwMzcyfDA&ixlib=rb-4.1.0&q=80&w=1080'
    ],
    category: 'Application',
    title: 'E-commerce Starter Kit',
    description: 'Kit complet pour créer votre boutique en ligne. Next.js + Stripe + CMS headless. Prêt à déployer.',
    price: '249 €',
    rating: 4.9,
    reviewCount: 71,
    longDescription: 'Solution e-commerce complète et moderne. Intégration Stripe pour les paiements, CMS headless pour la gestion de contenu, dashboard admin et optimisations SEO avancées.',
    features: [
      'Next.js 14 complet',
      'Intégration Stripe',
      'CMS Headless',
      'Dashboard vendeur',
      'Gestion stock',
      'SEO optimisé',
      'Email automatisés',
      'Multi-devises'
    ],
    includes: [
      'Code source full-stack',
      'Setup Stripe inclus',
      'CMS configuré',
      'Templates emails',
      'Guide de déploiement',
      'Support premium 1 an'
    ],
    prerequisites: [
      'Connaissances Next.js',
      'Bases en e-commerce',
      'Compte Stripe'
    ]
  },
  {
    id: 'podcast-production',
    image: 'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?w=800&q=80',
    images: [
      'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?w=800&q=80',
      'https://images.unsplash.com/photo-1627667050609-d4ba6483a368?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwb2RjYXN0JTIwcmVjb3JkaW5nJTIwc3R1ZGlvfGVufDF8fHx8MTc2NTM1MzM3NHww&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1745848413041-3eeb106db501?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtaWNyb3Bob25lJTIwYXVkaW8lMjBlcXVpcG1lbnR8ZW58MXx8fHwxNzY1Mzk5ODY2fDA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1764664035176-8e92ff4f128e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwb2RjYXN0JTIwZWRpdGluZyUyMHNvZnR3YXJlfGVufDF8fHx8MTc2NTM5OTg2N3ww&ixlib=rb-4.1.0&q=80&w=1080'
    ],
    category: 'Ebook',
    title: 'Guide Production Podcast',
    description: 'Guide complet pour lancer et monétiser votre podcast. De l\'équipement au marketing, tout est couvert.',
    price: '45 €',
    rating: 4.6,
    reviewCount: 138,
    longDescription: 'Le guide ultime pour créer, produire et monétiser un podcast professionnel. Équipement recommandé, techniques d\'enregistrement, édition, distribution et stratégies de monétisation.',
    features: [
      '200 pages détaillées',
      'Guide équipement',
      'Techniques d\'édition',
      'Stratégies marketing',
      'Monétisation',
      'Templates inclus',
      'Ressources audio',
      'Communauté'
    ],
    includes: [
      'Ebook PDF complet',
      'Checklist équipement',
      'Templates de scripts',
      'Guide de montage',
      'Stratégies de croissance',
      'Accès communauté'
    ],
    prerequisites: [
      'Passion pour l\'audio',
      'Volonté de créer'
    ]
  },
  {
    id: 'mobile-ui-kit',
    image: 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=800&q=80',
    images: [
      'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=800&q=80',
      'https://images.unsplash.com/photo-1758598304354-0a86fd5d62c2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzbWFydHBob25lJTIwYXBwJTIwc2NyZWVuc3xlbnwxfHx8fDE3NjUzOTk4Njd8MA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1750056393326-8feed2a1c34f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtb2JpbGUlMjB1aSUyMG1vY2t1cHxlbnwxfHx8fDE3NjUzOTk4Njd8MA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1609921212029-bb5a28e60960?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtb2JpbGUlMjBhcHAlMjBkZXNpZ258ZW58MXx8fHwxNzY1MjkxMzQ5fDA&ixlib=rb-4.1.0&q=80&w=1080'
    ],
    category: 'Template',
    title: 'Mobile UI Kit Premium',
    description: 'Kit UI mobile avec 150+ écrans pour iOS et Android. Figma + React Native components. Design moderne.',
    price: '89 €',
    rating: 4.8,
    reviewCount: 156,
    longDescription: 'Collection premium de 150+ écrans mobile design pour iOS et Android. Fichiers Figma organisés, composants React Native et guidelines de design pour une cohérence parfaite.',
    features: [
      '150+ écrans design',
      'Figma + React Native',
      'iOS + Android',
      'Composants modulaires',
      'Design system inclus',
      'Icônes personnalisées',
      'Animations fluides',
      'Mises à jour régulières'
    ],
    includes: [
      'Fichiers Figma complets',
      'Composants React Native',
      'Guide de style',
      'Icônes SVG',
      'Templates d\'écrans',
      'Support 3 mois'
    ],
    prerequisites: [
      'Connaissances design mobile',
      'Figma ou React Native'
    ]
  },
  {
    id: 'seo-ultimate-guide',
    image: 'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?w=800&q=80',
    images: [
      'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?w=800&q=80',
      'https://images.unsplash.com/photo-1657812160299-6b656decd5b1?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzZW8lMjBzZWFyY2glMjBvcHRpbWl6YXRpb258ZW58MXx8fHwxNzY1Mzk0ODcyfDA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1599658880436-c61792e70672?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb29nbGUlMjBhbmFseXRpY3MlMjBkYXRhfGVufDF8fHx8MTc2NTM5OTg3MXww&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1542744173-05336fcc7ad4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzZWFyY2glMjBlbmdpbmUlMjBtYXJrZXRpbmd8ZW58MXx8fHwxNzY1Mzk5ODcxfDA&ixlib=rb-4.1.0&q=80&w=1080'
    ],
    category: 'Ebook',
    title: 'SEO - Le Guide Ultime 2024',
    description: 'Formation SEO complète et à jour. Stratégies on-page, off-page, technique. 300 pages + outils inclus.',
    price: '69 €',
    rating: 4.9,
    reviewCount: 245,
    longDescription: 'Le guide SEO le plus complet en français. Toutes les stratégies actualisées pour 2024 : optimisation technique, contenu, netlinking, SEO local et international. Cas pratiques inclus.',
    features: [
      '300 pages de contenu',
      'Stratégies 2024',
      'SEO technique',
      'Content marketing',
      'Link building',
      'SEO local',
      'Outils recommandés',
      'Études de cas'
    ],
    includes: [
      'Ebook PDF complet',
      'Checklist SEO complète',
      'Templates de contenu',
      'Outils et ressources',
      'Bonus vidéos',
      'Updates gratuites'
    ],
    prerequisites: [
      'Bases en marketing web',
      'Site web existant ou projet'
    ]
  },
  {
    id: 'portfolio-creative',
    image: 'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=800&q=80',
    images: [
      'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=800&q=80',
      'https://images.unsplash.com/photo-1760071744047-5542cbfda184?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjcmVhdGl2ZSUyMHBvcnRmb2xpbyUyMGRlc2lnbnxlbnwxfHx8fDE3NjUzNjY1Mzh8MA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1583932692875-a42450d50acf?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx3ZWIlMjBwb3J0Zm9saW8lMjBzaG93Y2FzZXxlbnwxfHx8fDE3NjUzOTk4NzJ8MA&ixlib=rb-4.1.0&q=80&w=1080',
      'https://images.unsplash.com/photo-1728281144091-b743062a9bf0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxkZXNpZ25lciUyMHdvcmtzcGFjZSUyMGNyZWF0aXZlfGVufDF8fHx8MTc2NTM5OTg3Mnww&ixlib=rb-4.1.0&q=80&w=1080'
    ],
    category: 'Template',
    title: 'Portfolio Créatif Animé',
    description: 'Template portfolio avec animations impressionnantes. Next.js + Three.js + Framer Motion. Unique et moderne.',
    price: '79 €',
    rating: 4.7,
    reviewCount: 103,
    longDescription: 'Template de portfolio créatif avec animations 3D et effets visuels époustouflants. Parfait pour designers, développeurs et créatifs qui veulent se démarquer.',
    features: [
      'Animations 3D Three.js',
      'Next.js 14',
      'Framer Motion',
      'Scroll animations',
      'Galerie interactive',
      'Blog intégré',
      'Contact form',
      'Performance optimale'
    ],
    includes: [
      'Code source complet',
      'Assets 3D inclus',
      'Composants animés',
      'CMS headless setup',
      'Documentation',
      'Support 3 mois'
    ],
    prerequisites: [
      'Connaissances React/Next.js',
      'Sensibilité artistique'
    ]
  }
];

// Fonction pour obtenir un produit par ID
export function getProductById(id: string): Product | undefined {
  return products.find(product => product.id === id);
}

// Fonction pour obtenir des produits par catégorie
export function getProductsByCategory(category: 'Ebook' | 'Application' | 'Template'): Product[] {
  return products.filter(product => product.category === category);
}

// Fonction pour obtenir des produits similaires (même catégorie, exclut le produit actuel)
export function getSimilarProducts(productId: string, limit: number = 3): Product[] {
  const product = getProductById(productId);
  if (!product) return [];
  
  return products
    .filter(p => p.category === product.category && p.id !== productId)
    .slice(0, limit);
}