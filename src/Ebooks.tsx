import { useState } from 'react';
import { ChevronRight, ChevronDown, Filter, Star, Heart, X } from 'lucide-react';
import Header from './components/Header';
import imgImageGuideDuDeveloppeurModerne from "figma:asset/744f2d0dba28454e218a40daea3278bcd1cbb92a.png";
import imgImageMarketingDigitalStrategiesCompletes from "figma:asset/5b71e8eec533d52b842e8ff5362289157b7616de.png";
import imgImageReussirEnFreelanceGuideComplet from "figma:asset/236b4a075f0568590c7792c9f0da279ca9986449.png";
import imgImageCreerSaStartupDeLideeAuSucces from "figma:asset/3e9e1a988c3442c5f4e2957a483710e5b080b38f.png";
import imgImageUiUxDesignDeZeroAExpert from "figma:asset/12691efbc28e533809020b711c963955df70adff.png";

interface EbooksProps {
  onNavigateHome: () => void;
  onNavigateHowItWorks: () => void;
  onNavigateAllProducts: () => void;
  onNavigateApplications?: () => void;
  onNavigateTemplates?: () => void;
  onNavigateFAQ?: () => void;
}

function FilterSection() {
  const [showFilters, setShowFilters] = useState(false);
  const [isOnPromotion, setIsOnPromotion] = useState(false);
  const [selectedRange, setSelectedRange] = useState<string>('');
  const [selectedRating, setSelectedRating] = useState<number | null>(null);
  const [minPrice, setMinPrice] = useState('');
  const [maxPrice, setMaxPrice] = useState('');

  const ranges = [
    { id: 'starter', label: 'Starter' },
    { id: 'pro', label: 'Pro' },
    { id: 'premium', label: 'Premium' }
  ];

  const priceRanges = [
    { id: 'under30', label: 'Moins de 30€' },
    { id: '30to50', label: '30€ - 50€' },
    { id: 'over50', label: 'Plus de 50€' }
  ];

  const handleReset = () => {
    setIsOnPromotion(false);
    setSelectedRange('');
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
            {ranges.map(range => (
              <label key={range.id} className="flex items-center gap-3 cursor-pointer group">
                <input 
                  type="radio"
                  name="range"
                  checked={selectedRange === range.id}
                  onChange={() => setSelectedRange(range.id)}
                  className="w-4 h-4 border-gray-300 text-[#d2a30b] focus:ring-[#d2a30b]"
                />
                <span className="text-sm text-[#4a5565] group-hover:text-[#1a1a1a]">{range.label}</span>
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

interface Ebook {
  image: string;
  title: string;
  price: string;
  originalPrice?: string;
  rating: number;
  reviewCount: number;
  badge?: string;
}

function EbookCard({ ebook }: { ebook: Ebook }) {
  const [isFavorite, setIsFavorite] = useState(false);

  return (
    <div className="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all group">
      <div className="relative h-[234px] bg-gray-50 overflow-hidden">
        <img src={ebook.image} alt={ebook.title} className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
        {/* Overlay gradient */}
        <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
        
        {ebook.badge && (
          <div className="absolute top-4 left-4 bg-[#d2a30b] text-white px-3 py-2 rounded-lg text-xs font-['Montserrat',sans-serif]">
            {ebook.badge}
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
          <h3 className="font-['Merriweather',serif] text-white text-base mb-1 line-clamp-2">{ebook.title}</h3>
          <p className="text-xs text-white/70">Ebook</p>
        </div>
      </div>
      
      <div className="p-4">
        <div className="mb-3">
          {ebook.originalPrice && (
            <p className="text-sm text-gray-400 line-through mb-1">{ebook.originalPrice}</p>
          )}
          <p className="text-lg text-[#1a1a1a] font-['Montserrat',sans-serif]">{ebook.price}</p>
        </div>
        
        <div className="flex items-center gap-1">
          {Array.from({ length: 5 }).map((_, i) => (
            <Star 
              key={i} 
              size={14} 
              fill={i < ebook.rating ? '#d2a30b' : 'none'}
              stroke={i < ebook.rating ? '#d2a30b' : '#d1d5db'}
            />
          ))}
          <span className="text-xs text-gray-500 ml-1">({ebook.reviewCount})</span>
        </div>
      </div>
    </div>
  );
}

function EbooksGrid() {
  const ebooks: Ebook[] = [
    {
      image: imgImageGuideDuDeveloppeurModerne,
      title: 'Guide du Développeur Moderne',
      price: '59 €',
      rating: 5,
      reviewCount: 2341,
      badge: 'Populaire'
    },
    {
      image: imgImageMarketingDigitalStrategiesCompletes,
      title: 'Marketing Digital - Stratégies complètes',
      price: '39 €',
      originalPrice: '59 €',
      rating: 4,
      reviewCount: 1876
    },
    {
      image: imgImageReussirEnFreelanceGuideComplet,
      title: 'Réussir en Freelance - Guide complet',
      price: '44 €',
      rating: 5,
      reviewCount: 1543,
      badge: 'Populaire'
    },
    {
      image: imgImageCreerSaStartupDeLideeAuSucces,
      title: 'Créer sa Startup - De l\'idée au succès',
      price: '49 €',
      rating: 4,
      reviewCount: 987
    },
    {
      image: imgImageUiUxDesignDeZeroAExpert,
      title: 'UI/UX Design : De Zéro à Expert',
      price: '54 €',
      rating: 5,
      reviewCount: 2156
    }
  ];

  return (
    <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      {ebooks.map((ebook, index) => (
        <EbookCard key={index} ebook={ebook} />
      ))}
    </div>
  );
}

function FAQ() {
  const [openIndex, setOpenIndex] = useState<number | null>(0);

  const faqs = [
    {
      question: 'Quel format sont les ebooks ?',
      answer: 'Tous nos ebooks sont disponibles au format PDF, compatibles avec tous les appareils (ordinateur, tablette, smartphone). Ils sont optimisés pour une lecture confortable.'
    },
    {
      question: 'Puis-je imprimer les ebooks ?',
      answer: 'Oui, tous nos ebooks peuvent être imprimés. Cependant, nous recommandons la lecture numérique pour une expérience optimale et pour préserver l\'environnement.'
    },
    {
      question: 'Les ebooks sont-ils mis à jour ?',
      answer: 'Absolument ! Nos ebooks professionnels reçoivent des mises à jour régulières. Vous serez notifié par email et pourrez télécharger la dernière version gratuitement.'
    },
    {
      question: 'Y a-t-il une garantie de remboursement ?',
      answer: 'Oui, nous offrons une garantie satisfait ou remboursé de 30 jours sur tous nos ebooks. Si le contenu ne répond pas à vos attentes, contactez notre support pour un remboursement complet.'
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
            Ebooks pour développeurs, designers et entrepreneurs digitaux
          </h2>
        </div>

        <div className="max-w-none text-[#4a5565] space-y-6">
          <div className="grid md:grid-cols-2 gap-8">
            <div>
              <h3 className="font-['Merriweather',serif] text-[#0d1421] mb-3">
                Des guides complets pour développer vos compétences
              </h3>
              <p>
                Découvrez notre collection d&apos;ebooks professionnels conçus pour vous aider à développer vos compétences en développement web, marketing digital et entrepreneuriat. Chaque ebook est rédigé par des experts du domaine et contient des stratégies éprouvées, des études de cas réelles et des conseils pratiques immédiatement applicables.
              </p>
            </div>
            
            <div>
              <h3 className="font-['Merriweather',serif] text-[#0d1421] mb-3">
                Contenu à jour et support inclus
              </h3>
              <p>
                Nos ebooks bénéficient de mises à jour régulières pour rester alignés avec les dernières tendances et technologies du marché. React, Vue.js, Node.js, TypeScript, Flutter, CSS, Figma, et bien d&apos;autres technologies sont couvertes en profondeur dans nos guides spécialisés.
              </p>
            </div>
          </div>

          <div className="bg-[#fffbf0] border border-[#d2a30b]/20 rounded-2xl p-8 mt-8">
            <p className="mb-4">
              Que vous soyez développeur débutant cherchant à maîtriser les fondamentaux, freelance souhaitant développer votre activité, ou entrepreneur digital en quête de stratégies marketing efficaces, nos ebooks vous offrent le savoir-faire nécessaire pour atteindre vos objectifs professionnels.
            </p>
            <p>
              Chaque achat est protégé par notre garantie satisfait ou remboursé de 30 jours. Investissez dans votre formation dès maintenant et rejoignez les milliers de professionnels qui ont transformé leur carrière grâce à nos ressources.
            </p>
          </div>
        </div>
      </div>
    </section>
  );
}

export default function Ebooks({ onNavigateHome, onNavigateHowItWorks, onNavigateAllProducts, onNavigateApplications, onNavigateTemplates, onNavigateFAQ }: EbooksProps) {
  return (
    <div className="min-h-screen bg-white">
      <Header 
        onNavigateHome={onNavigateHome}
        onNavigateHowItWorks={onNavigateHowItWorks}
        onNavigateAllProducts={onNavigateAllProducts}
        onNavigateEbooks={() => {}}
        onNavigateApplications={onNavigateApplications}
        onNavigateTemplates={onNavigateTemplates}
        onNavigateFAQ={onNavigateFAQ}
        currentPage="ebooks"
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
            <h1 className="text-[#1a1a1a] mb-3">Ebooks</h1>
            <p className="text-[#4a5565] font-['Montserrat',sans-serif]">
              Découvrez notre collection d&apos;ebooks pour développer vos compétences et votre business
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

            {/* Ebooks Grid */}
            <main>
              <EbooksGrid />
            </main>
          </div>
        </div>
      </section>

      {/* FAQ */}
      <FAQ />

      {/* SEO Section */}
      <SEOSection />
    </div>
  );
}