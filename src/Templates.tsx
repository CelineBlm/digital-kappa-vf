import { useState } from 'react';
import { ChevronRight, ChevronDown, Filter, Star, Heart, X } from 'lucide-react';
import Header from './components/Header';
import imgImageDashboardAnalyticsPro from "figma:asset/c5652365ed550b5b7a17575051dd00eca3c75c14.png";
import imgImageLandingPagesBundle20Templates from "figma:asset/6b94f4231d1e7f54dd9bfdb1362bd148ce51636e.png";
import imgImagePack50TemplatesEmailMarketing from "figma:asset/3c212020814f43aad7053ec2a853c665b8b72adc.png";
import imgImageUiKitModernComponentsLibrary from "figma:asset/022d28bcb1f45d04c568cb457cdc11f572e99f92.png";

interface TemplatesProps {
  onNavigateHome: () => void;
  onNavigateHowItWorks: () => void;
  onNavigateAllProducts: () => void;
  onNavigateEbooks?: () => void;
  onNavigateApplications?: () => void;
  onNavigateTemplates?: () => void;
}

function FilterSection() {
  const [showFilters, setShowFilters] = useState(false);
  const [isOnPromotion, setIsOnPromotion] = useState(false);
  const [selectedCategory, setSelectedCategory] = useState<string>('');
  const [selectedRating, setSelectedRating] = useState<number | null>(null);
  const [minPrice, setMinPrice] = useState('');
  const [maxPrice, setMaxPrice] = useState('');

  const categories = [
    { id: 'web', label: 'Web' },
    { id: 'email', label: 'Email' },
    { id: 'figma', label: 'Figma' }
  ];

  const priceRanges = [
    { id: 'under25', label: 'Moins de 25€' },
    { id: '25to50', label: '25€ - 50€' },
    { id: '50to100', label: '50€ - 100€' },
    { id: 'over100', label: 'Plus de 100€' }
  ];

  const handleReset = () => {
    setIsOnPromotion(false);
    setSelectedCategory('');
    setSelectedRating(null);
    setMinPrice('');
    setMaxPrice('');
  };

  return (
    <>
      {/* Mobile filter button */}
      <div className="lg:hidden mb-4">
        <button 
          onClick={() => setShowFilters(!showFilters)}
          className="w-full flex items-center justify-between bg-white border border-gray-200 rounded-lg px-4 py-3"
        >
          <div className="flex items-center gap-2">
            <Filter size={20} className="text-[#d2a30b]" />
            <span className="text-[#1a1a1a]">Filtres</span>
          </div>
          <ChevronDown size={20} className={`transition-transform ${showFilters ? 'rotate-180' : ''}`} />
        </button>
      </div>

      {/* Filters panel */}
      <div className={`${showFilters ? 'block' : 'hidden'} lg:block bg-white border border-gray-100 rounded-xl p-6 lg:sticky lg:top-24`}>
        <div className="flex items-center justify-between mb-6 lg:mb-8">
          <h3 className="font-['Merriweather',serif] text-[#1a1a1a]">Filtres</h3>
          <button onClick={() => setShowFilters(false)} className="lg:hidden">
            <X size={20} />
          </button>
        </div>

        {/* En promotion */}
        <div className="mb-6">
          <label className="flex items-center gap-3 cursor-pointer group">
            <div className="relative">
              <input 
                type="checkbox"
                checked={isOnPromotion}
                onChange={(e) => setIsOnPromotion(e.target.checked)}
                className="sr-only peer"
              />
              <div className="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-[#d2a30b] transition-colors"></div>
              <div className="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform peer-checked:translate-x-5"></div>
            </div>
            <span className="text-sm text-[#4a5565] group-hover:text-[#1a1a1a]">En promotion</span>
          </label>
        </div>

        {/* Gamme */}
        <div className="mb-6">
          <h4 className="font-['Montserrat',sans-serif] text-[#1a1a1a] mb-4">Gamme</h4>
          <div className="space-y-3">
            {categories.map(category => (
              <label key={category.id} className="flex items-center gap-3 cursor-pointer group">
                <input 
                  type="radio"
                  name="category"
                  checked={selectedCategory === category.id}
                  onChange={() => setSelectedCategory(category.id)}
                  className="w-4 h-4 border-gray-300 text-[#d2a30b] focus:ring-[#d2a30b]"
                />
                <span className="text-sm text-[#4a5565] group-hover:text-[#1a1a1a]">{category.label}</span>
              </label>
            ))}
          </div>
        </div>

        {/* Prix */}
        <div className="mb-6">
          <h4 className="font-['Montserrat',sans-serif] text-[#1a1a1a] mb-4">Prix</h4>
          <div className="space-y-3 mb-4">
            {priceRanges.map(range => (
              <label key={range.id} className="flex items-center gap-3 cursor-pointer group">
                <input 
                  type="radio"
                  name="priceRange"
                  className="w-4 h-4 border-gray-300 text-[#d2a30b] focus:ring-[#d2a30b]"
                />
                <span className="text-sm text-[#4a5565] group-hover:text-[#1a1a1a]">{range.label}</span>
              </label>
            ))}
          </div>
          
          <div className="grid grid-cols-2 gap-3">
            <input 
              type="number"
              placeholder="Min"
              value={minPrice}
              onChange={(e) => setMinPrice(e.target.value)}
              className="border border-gray-200 rounded-lg px-3 py-2 text-sm text-[#4a5565] focus:outline-none focus:ring-2 focus:ring-[#d2a30b] focus:border-transparent"
            />
            <input 
              type="number"
              placeholder="Max"
              value={maxPrice}
              onChange={(e) => setMaxPrice(e.target.value)}
              className="border border-gray-200 rounded-lg px-3 py-2 text-sm text-[#4a5565] focus:outline-none focus:ring-2 focus:ring-[#d2a30b] focus:border-transparent"
            />
          </div>
        </div>

        {/* Notes d'étoiles */}
        <div className="mb-8">
          <h4 className="font-['Montserrat',sans-serif] text-[#1a1a1a] mb-4">Notes d&apos;étoiles</h4>
          <div className="space-y-3">
            {[5, 4, 3, 2].map(rating => (
              <label key={rating} className="flex items-center gap-2 cursor-pointer group">
                <input 
                  type="radio"
                  name="rating"
                  checked={selectedRating === rating}
                  onChange={() => setSelectedRating(rating)}
                  className="w-4 h-4 border-gray-300 text-[#d2a30b] focus:ring-[#d2a30b]"
                />
                <div className="flex items-center gap-1">
                  {Array.from({ length: rating }).map((_, i) => (
                    <Star key={i} size={14} fill="#d2a30b" stroke="#d2a30b" />
                  ))}
                  {Array.from({ length: 5 - rating }).map((_, i) => (
                    <Star key={`empty-${i}`} size={14} stroke="#d1d5db" fill="none" />
                  ))}
                  <span className="text-sm text-[#4a5565] ml-1">& plus</span>
                </div>
              </label>
            ))}
          </div>
        </div>

        {/* Reset button */}
        <button 
          onClick={handleReset}
          className="w-full bg-[#d2a30b] text-white px-4 py-3 rounded-lg hover:bg-[#b8900a] transition-colors text-sm font-['Montserrat',sans-serif]"
        >
          Effacer les filtres
        </button>
      </div>
    </>
  );
}

interface Template {
  image: string;
  title: string;
  price: string;
  originalPrice?: string;
  rating: number;
  reviewCount: number;
  badge?: string;
}

function TemplateCard({ template }: { template: Template }) {
  const [isFavorite, setIsFavorite] = useState(false);

  return (
    <div className="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all group">
      <div className="relative h-[234px] bg-gray-50 overflow-hidden">
        <img src={template.image} alt={template.title} className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
        {/* Overlay gradient */}
        <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
        
        {template.badge && (
          <div className="absolute top-4 left-4 bg-[#d2a30b] text-white px-3 py-2 rounded-lg text-xs font-['Montserrat',sans-serif]">
            {template.badge}
          </div>
        )}

        <button 
          onClick={() => setIsFavorite(!isFavorite)}
          className="absolute top-4 right-4 w-9 h-9 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/20 transition-colors"
        >
          <Heart 
            size={16} 
            className={isFavorite ? 'fill-white stroke-white' : 'stroke-white'}
          />
        </button>

        <div className="absolute bottom-4 left-4 right-4">
          <h3 className="font-['Merriweather',serif] text-white text-base mb-1 line-clamp-2">{template.title}</h3>
          <p className="text-xs text-white/70">Template</p>
        </div>
      </div>
      
      <div className="p-4">
        <div className="mb-3">
          {template.originalPrice && (
            <p className="text-sm text-gray-400 line-through mb-1">{template.originalPrice}</p>
          )}
          <p className="text-lg text-[#1a1a1a] font-['Montserrat',sans-serif]">{template.price}</p>
        </div>
        
        <div className="flex items-center gap-1">
          {Array.from({ length: 5 }).map((_, i) => (
            <Star 
              key={i} 
              size={14} 
              fill={i < template.rating ? '#d2a30b' : 'none'}
              stroke={i < template.rating ? '#d2a30b' : '#d1d5db'}
            />
          ))}
          <span className="text-xs text-gray-500 ml-1">({template.reviewCount})</span>
        </div>
      </div>
    </div>
  );
}

function TemplatesGrid() {
  const templates: Template[] = [
    {
      image: imgImageDashboardAnalyticsPro,
      title: 'Dashboard Analytics Pro',
      price: '59 €',
      rating: 5,
      reviewCount: 2341,
      badge: 'Populaire'
    },
    {
      image: imgImageLandingPagesBundle20Templates,
      title: 'Landing Pages Bundle - 20 Templates',
      price: '89 €',
      rating: 5,
      reviewCount: 1987
    },
    {
      image: imgImagePack50TemplatesEmailMarketing,
      title: 'Pack 50 Templates Email Marketing',
      price: '45 €',
      rating: 4,
      reviewCount: 1543,
      badge: 'Populaire'
    },
    {
      image: imgImageUiKitModernComponentsLibrary,
      title: 'UI Kit Modern - Components Library',
      price: '39 €',
      rating: 5,
      reviewCount: 2876
    },
    {
      image: imgImageDashboardAnalyticsPro,
      title: 'Premium Templates - Dark Mode',
      price: '54 €',
      rating: 4,
      reviewCount: 987
    },
    {
      image: imgImageLandingPagesBundle20Templates,
      title: 'Portfolio Templates - Creative Pack',
      price: '49 €',
      rating: 5,
      reviewCount: 2156
    }
  ];

  return (
    <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      {templates.map((template, index) => (
        <TemplateCard key={index} template={template} />
      ))}
    </div>
  );
}

function FAQ() {
  const [openIndex, setOpenIndex] = useState<number | null>(0);

  const faqs = [
    {
      question: 'Puis-je personnaliser les templates ?',
      answer: 'Absolument ! Tous nos templates sont 100% personnalisables. Vous avez accès au code source complet (HTML, CSS, JavaScript) et vous pouvez les modifier selon vos besoins, les adapter à votre marque, changer les couleurs, les textes et la structure.'
    },
    {
      question: 'Les templates sont-ils responsive ?',
      answer: 'Oui, tous nos templates sont conçus en mobile-first et sont entièrement responsive. Ils s\'adaptent parfaitement à tous les types d\'écrans : smartphones, tablettes, ordinateurs de bureau et grands écrans.'
    },
    {
      question: 'Dans quel format sont les templates ?',
      answer: 'Nous proposons des templates dans plusieurs formats : HTML/CSS/JS pour le web, fichiers Figma pour les designs, et templates d\'emails au format HTML compatible avec tous les clients email (Gmail, Outlook, etc.).'
    },
    {
      question: 'Puis-je utiliser les templates pour mes clients ?',
      answer: 'Oui, vous disposez d\'une licence commerciale étendue qui vous permet d\'utiliser les templates pour vos projets clients. Vous pouvez créer un nombre illimité de projets et les vendre à vos clients sans frais supplémentaires.'
    }
  ];

  return (
    <section className="bg-white py-12 lg:py-20 px-4 lg:px-20">
      <div className="max-w-4xl mx-auto">
        <div className="text-center mb-8 lg:mb-12">
          <div className="inline-flex items-center gap-2 bg-[#fffbf0] border border-[#d2a30b]/20 rounded-full px-4 py-2 mb-4">
            <div className="w-2 h-2 bg-[#d2a30b] rounded-full"></div>
            <p className="text-sm text-[#1a1a1a] font-['Montserrat',sans-serif]">Support</p>
          </div>
          <h2 className="text-[#1a1a1a] mb-4">Questions fréquentes</h2>
          <p className="text-[#4a5565]">
            Retrouvez les réponses aux questions les plus courantes
          </p>
        </div>
        
        <div className="space-y-4">
          {faqs.map((faq, index) => (
            <div key={index} className="bg-gray-50 rounded-xl overflow-hidden">
              <button 
                onClick={() => setOpenIndex(openIndex === index ? null : index)}
                className="w-full font-['Montserrat',sans-serif] text-[#1a1a1a] p-6 text-left flex items-center justify-between hover:bg-gray-100 transition-colors"
              >
                <span>{faq.question}</span>
                <ChevronRight 
                  className={`transition-transform text-[#d2a30b] ${openIndex === index ? 'rotate-90' : ''}`} 
                  size={20} 
                />
              </button>
              {openIndex === index && (
                <div className="px-6 pb-6">
                  <p className="text-[#4a5565]">{faq.answer}</p>
                </div>
              )}
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

function SEOSection() {
  return (
    <section className="bg-gradient-to-b from-gray-50 to-white py-12 lg:py-20 px-4 lg:px-20">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-10">
          <h2 className="text-[#0d1421] mb-4">
            Templates web, Figma et design pour créer des projets professionnels rapidement
          </h2>
        </div>

        <div className="max-w-none text-[#4a5565] space-y-6">
          <div className="grid md:grid-cols-2 gap-8">
            <div>
              <h3 className="font-['Merriweather',serif] text-[#0d1421] mb-3">
                Une collection complète de templates professionnels
              </h3>
              <p>
                Digital Kappa propose une vaste collection de templates professionnels pour tous vos projets web, applications et designs. Nos templates incluent des landing pages modernes, des dashboards analytics, des kits UI complets, des templates d&apos;emails marketing et des designs Figma prêts à l&apos;emploi. Chaque template est conçu par des designers professionnels et optimisé pour la conversion et l&apos;expérience utilisateur.
              </p>
            </div>
            
            <div>
              <h3 className="font-['Merriweather',serif] text-[#0d1421] mb-3">
                Gagnez du temps avec des templates prêts à l&apos;emploi
              </h3>
              <p>
                Tous nos templates sont 100% personnalisables et compatibles avec les technologies modernes. Vous avez accès au code source complet, aux fichiers Figma éditables et à une documentation détaillée. Que vous soyez développeur, designer ou entrepreneur, nos templates vous permettent de lancer vos projets en quelques heures au lieu de plusieurs semaines. Support inclus et mises à jour régulières garanties.
              </p>
            </div>
          </div>

          <div className="bg-[#fffbf0] border border-[#d2a30b]/20 rounded-2xl p-8 mt-8">
            <p className="mb-4">
              Nos templates web incluent généralement plusieurs pages (accueil, à propos, services, contact), des composants réutilisables, une documentation complète et un support technique. Les templates Figma vous donnent accès à des systèmes de design complets avec composants, variables et styles organisés. Nos packs d&apos;emails marketing contiennent des dizaines de templates testés et compatibles avec tous les clients email.
            </p>
            <p>
              Chaque template bénéficie de notre garantie satisfait ou remboursé de 30 jours. Explorez notre catalogue et découvrez comment nos templates peuvent accélérer vos projets et impressionner vos clients. Plus de 500 professionnels nous font confiance pour leurs projets digitaux. Commencez dès maintenant et transformez vos idées en réalité avec nos templates de qualité professionnelle.
            </p>
          </div>
        </div>
      </div>
    </section>
  );
}

function Footer() {
  return (
    <footer className="bg-[#1a1a1a] text-gray-300 py-12 lg:py-16 px-4 lg:px-20">
      <div className="max-w-7xl mx-auto">
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-8">
          <div>
            <h4 className="text-white mb-4">À propos</h4>
            <p className="text-sm">
              Digital Kappa est votre marketplace de confiance pour des produits digitaux de qualité professionnelle.
            </p>
          </div>
          
          <div>
            <h4 className="text-white mb-4">Produits</h4>
            <ul className="space-y-2 text-sm">
              <li><a href="#" className="hover:text-[#d2a30b]">Ebooks</a></li>
              <li><a href="#" className="hover:text-[#d2a30b]">Templates</a></li>
              <li><a href="#" className="hover:text-[#d2a30b]">Applications</a></li>
            </ul>
          </div>
          
          <div>
            <h4 className="text-white mb-4">Ressources</h4>
            <ul className="space-y-2 text-sm">
              <li><a href="#" className="hover:text-[#d2a30b]">Blog</a></li>
              <li><a href="#" className="hover:text-[#d2a30b]">Tutorials</a></li>
              <li><a href="#" className="hover:text-[#d2a30b]">Contact</a></li>
            </ul>
          </div>
          
          <div>
            <h4 className="text-white mb-4">Légal</h4>
            <ul className="space-y-2 text-sm">
              <li><a href="#" className="hover:text-[#d2a30b]">Conditions générales</a></li>
              <li><a href="#" className="hover:text-[#d2a30b]">Politique de confidentialité</a></li>
              <li><a href="#" className="hover:text-[#d2a30b]">Mentions légales</a></li>
            </ul>
          </div>
        </div>
        
        <div className="border-t border-gray-700 pt-8 text-center text-sm">
          <p>&copy; 2024 Digital Kappa. Tous droits réservés.</p>
        </div>
      </div>
    </footer>
  );
}

export default function Templates({ onNavigateHome, onNavigateHowItWorks, onNavigateAllProducts, onNavigateEbooks, onNavigateApplications, onNavigateTemplates }: TemplatesProps) {
  return (
    <div className="min-h-screen bg-white">
      <Header 
        onNavigateHome={onNavigateHome}
        onNavigateHowItWorks={onNavigateHowItWorks}
        onNavigateAllProducts={onNavigateAllProducts}
        onNavigateEbooks={onNavigateEbooks}
        onNavigateApplications={onNavigateApplications}
        onNavigateTemplates={() => {}}
        currentPage="templates"
      />
      
      {/* Hero Section */}
      <section className="bg-gray-50 py-8 lg:py-12 px-4 lg:px-20 border-b border-gray-100">
        <div className="max-w-7xl mx-auto">
          <div className="mb-6">
            <button 
              onClick={onNavigateHome}
              className="text-sm text-[#4a5565] hover:text-[#d2a30b] flex items-center gap-2 mb-4 font-['Montserrat',sans-serif]"
            >
              <ChevronRight size={16} className="rotate-180" />
              Retour à l&apos;accueil
            </button>
            <h1 className="text-[#1a1a1a] mb-3">Templates</h1>
            <p className="text-[#4a5565] font-['Montserrat',sans-serif]">
              Templates web, design et email pour créer des projets professionnels rapidement
            </p>
          </div>
        </div>
      </section>

      {/* Main Content */}
      <section className="py-8 lg:py-12 px-4 lg:px-20">
        <div className="max-w-7xl mx-auto">
          <div className="grid lg:grid-cols-[280px_1fr] gap-8">
            {/* Filters */}
            <aside>
              <FilterSection />
            </aside>

            {/* Templates Grid */}
            <main>
              <TemplatesGrid />
            </main>
          </div>
        </div>
      </section>

      {/* FAQ */}
      <FAQ />

      {/* SEO Section */}
      <SEOSection />

      {/* Footer */}
      <Footer />
    </div>
  );
}