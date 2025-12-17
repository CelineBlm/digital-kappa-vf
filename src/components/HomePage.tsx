import { ChevronRight, Shield, Download, Headphones } from 'lucide-react';
import svgPaths from "../imports/svg-m5wcxxm8qg";
import imgImageAppFitnessPremium from "figma:asset/3556d2c73fb65dd17ac0f57d3e344031227fc799.png";
import imgImageApplicationsMobiles from "figma:asset/8648536c0883a5947331ba9fbc4ef59822ac0c6e.png";
import imgImageEbooks from "figma:asset/e9f5d71690e44cb1e8e15349f857456a26f7eac4.png";
import imgImageTemplates from "figma:asset/02c98fb502c81b1a6d739238221bdd53dc3bc55b.png";
import imgImageDashboardAnalyticsPro from "figma:asset/c5652365ed550b5b7a17575051dd00eca3c75c14.png";
import imgImageGuideDuDeveloppeurModerne from "figma:asset/744f2d0dba28454e218a40daea3278bcd1cbb92a.png";
import imgImagePack50TemplatesEmailMarketing from "figma:asset/3c212020814f43aad7053ec2a853c665b8b72adc.png";
import imgImageECommerceAppStarterKit from "figma:asset/dfff3871f3ea26a1d2384c72d4a3c9f00ce62fdf.png";
import imgImageDigitalKappa from "figma:asset/53b398ce239e8e647f11ed2aaa9f513d956a813f.png";
import { imgVector } from "../imports/svg-ie8rj";
import Header from './Header';

interface HomePageProps {
  onNavigateHowItWorks: () => void;
  onNavigateAllProducts: () => void;
  onNavigateEbooks?: () => void;
  onNavigateApplications?: () => void;
  onNavigateTemplates?: () => void;
  onNavigateFAQ?: () => void;
}

function Logo() {
  return (
    <div className="flex items-center gap-3">
      <div className="h-8 w-12 relative overflow-clip">
        <div className="absolute bottom-0 left-0 right-[35%] top-0" style={{ maskImage: `url('${imgVector}')`, maskSize: '48px 32px', maskRepeat: 'no-repeat' }}>
          <svg className="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 29 32">
            <path d={svgPaths.p28d89680} fill="#D2A30B" />
          </svg>
        </div>
        <div className="absolute bottom-0 left-[65%] right-0 top-0" style={{ maskImage: `url('${imgVector}')`, maskSize: '48px 32px', maskRepeat: 'no-repeat', maskPosition: '-31.112px 0px' }}>
          <svg className="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 17 32">
            <path d={svgPaths.p2133f840} fill="#D2A30B" />
          </svg>
        </div>
      </div>
      <span className="font-['Montserrat',sans-serif] text-[#1a1a1a]">Digital Kappa</span>
    </div>
  );
}

function Hero({ onNavigateHowItWorks }: { onNavigateHowItWorks: () => void }) {
  return (
    <section className="bg-gray-50 relative overflow-hidden px-4 lg:px-20 py-8 lg:py-12">
      <div className="max-w-7xl mx-auto grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
        {/* Left content */}
        <div className="space-y-6">
          <div className="inline-flex items-center gap-2 bg-white border border-gray-100 rounded-full px-4 py-2 shadow-sm">
            <div className="w-2 h-2 bg-[#d2a30b] rounded-full"></div>
            <p className="text-sm text-[#0d1421]">Lancement officiel - Nouveaux produits disponibles</p>
          </div>
          
          <h1 className="text-[#0d1421]">
            <div className="mb-1">Marketplace de</div>
            <div className="text-[#d2a30b]">produits digitaux</div>
          </h1>
          
          <p className="text-[rgba(13,20,33,0.7)]">
            Découvrez une sélection de produits digitaux de qualité : applications mobiles, ebooks et templates pour booster votre productivité. Achat simple en un clic, téléchargement immédiat, accès à vie.
          </p>
          
          <div className="flex flex-col sm:flex-row gap-3">
            <button className="bg-[#d2a30b] text-white px-6 py-3 rounded-lg hover:bg-[#b8900a] transition-colors">
              Explorer les produits
            </button>
            <button 
              onClick={onNavigateHowItWorks}
              className="bg-white text-[#d2a30b] border border-[#d2a30b] px-6 py-3 rounded-lg hover:bg-[#fffbf0] transition-colors"
            >
              Comment ça marche
            </button>
          </div>
        </div>
        
        {/* Right content - Featured products */}
        <div className="relative min-h-[450px] lg:min-h-[500px]">
          {/* Decorative blur */}
          <div className="absolute top-0 right-0 lg:right-10 w-64 h-64 bg-[rgba(210,163,11,0.1)] rounded-full blur-3xl -z-10"></div>
          
          {/* Large card - Applications mobiles */}
          <div className="w-full max-w-[450px] mx-auto lg:mx-0 bg-white rounded-2xl border border-[#f0f2f5] shadow-xl overflow-hidden mb-4">
            <div className="relative h-[180px] overflow-hidden">
              <img src={imgImageApplicationsMobiles} alt="Applications mobiles" className="w-full h-full object-cover" />
              <div className="absolute inset-0 bg-gradient-to-b from-[rgba(13,20,33,0.6)] via-[rgba(13,20,33,0.15)] via-20% to-transparent"></div>
              <div className="absolute top-4 left-4 bg-[#d2a30b] px-2 py-1.5 rounded-lg">
                <p className="text-white text-xs">Populaire</p>
              </div>
              <div className="absolute bottom-4 left-4 right-4">
                <h3 className="font-['Merriweather',serif] text-white mb-1">Applications mobiles</h3>
                <p className="text-xs text-[rgba(255,255,255,0.7)]">Applications prêtes à l&apos;emploi</p>
              </div>
            </div>
          </div>
          
          {/* Small cards */}
          <div className="flex gap-4 max-w-[450px] mx-auto lg:mx-0">
            <div className="flex-1 bg-white rounded-2xl border border-[#f0f2f5] shadow-xl overflow-hidden">
              <div className="relative h-[220px] overflow-hidden">
                <img src={imgImageEbooks} alt="Ebooks" className="w-full h-full object-cover" />
                <div className="absolute inset-0 bg-gradient-to-b from-[rgba(13,20,33,0.6)] via-[rgba(13,20,33,0.15)] via-20% to-transparent"></div>
                <div className="absolute bottom-3 left-3 right-3">
                  <h4 className="font-['Merriweather',serif] text-white text-sm mb-0.5">Ebooks</h4>
                  <p className="text-[10px] text-[rgba(255,255,255,0.7)]">Guides & formations</p>
                </div>
              </div>
            </div>
            
            <div className="flex-1 bg-white rounded-2xl border border-[#f0f2f5] shadow-xl overflow-hidden">
              <div className="relative h-[220px] overflow-hidden">
                <img src={imgImageTemplates} alt="Templates" className="w-full h-full object-cover" />
                <div className="absolute inset-0 bg-gradient-to-b from-[rgba(13,20,33,0.6)] via-[rgba(13,20,33,0.15)] via-20% to-transparent"></div>
                <div className="absolute bottom-3 left-3 right-3">
                  <h4 className="font-['Merriweather',serif] text-white text-sm mb-0.5">Templates</h4>
                  <p className="text-[10px] text-[rgba(255,255,255,0.7)]">Design & code</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

function ValuePropositions() {
  const values = [
    {
      icon: (
        <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24">
          <path d={svgPaths.p29eafd00} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" />
          <path d={svgPaths.p8568600} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" />
          <path d={svgPaths.pbb34e00} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" />
        </svg>
      ),
      title: 'Simplicité',
      description: 'Interface intuitive pour trouver rapidement ce dont vous avez besoin'
    },
    {
      icon: (
        <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24">
          <path d={svgPaths.p36ab380} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" />
        </svg>
      ),
      title: 'Fiabilité',
      description: 'Produits vérifiés et transactions sécurisées'
    },
    {
      icon: (
        <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24">
          <path d={svgPaths.p23aa1a00} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" />
        </svg>
      ),
      title: 'Rapidité',
      description: 'Achat en un clic, téléchargement instantané'
    },
    {
      icon: (
        <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24">
          <path d={svgPaths.p2c6803f0} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" />
          <path d={svgPaths.p2e21a00} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" />
        </svg>
      ),
      title: 'Support',
      description: 'Assistance disponible pour tous vos achats'
    }
  ];

  return (
    <section className="bg-white py-12 lg:py-20 px-4 lg:px-20">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-10 lg:mb-12">
          <h2 className="text-[#1a1a1a] mb-4">Pourquoi choisir Digital Kappa</h2>
          <p className="text-[#4a5565] max-w-2xl mx-auto">
            Une plateforme conçue pour vous offrir la meilleure expérience d&apos;achat de produits digitaux
          </p>
        </div>
        
        <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
          {values.map((value, index) => (
            <div key={index} className="text-center">
              <div className="w-12 h-12 bg-[rgba(210,163,11,0.1)] rounded-full flex items-center justify-center mx-auto mb-4">
                {value.icon}
              </div>
              <h3 className="text-[#1a1a1a] mb-2">{value.title}</h3>
              <p className="text-sm text-[#4a5565]">{value.description}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

function ProductsSection({ onNavigateAllProducts }: { onNavigateAllProducts: () => void }) {
  const products = [
    {
      image: imgImageAppFitnessPremium,
      title: 'App Fitness Premium',
      price: '49 €'
    },
    {
      image: imgImageDashboardAnalyticsPro,
      title: 'Dashboard Analytics Pro',
      price: '39 €'
    },
    {
      image: imgImageGuideDuDeveloppeurModerne,
      title: 'Guide du Développeur Moderne',
      price: '29 €'
    }
  ];

  return (
    <section className="bg-gradient-to-b from-[#f9fafb] to-white py-12 lg:py-20 px-4 lg:px-20">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-10 lg:mb-12">
          <h2 className="text-[#1a1a1a] mb-4">Découvrez nos produits</h2>
          <p className="text-[#4a5565] max-w-2xl mx-auto">
            Une sélection de produits digitaux de haute qualité pour développeurs et créateurs
          </p>
        </div>
        
        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto mb-8">
          {products.map((product, index) => (
            <div key={index} className="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
              <div className="bg-gray-50 h-[220px] overflow-hidden">
                <img src={product.image} alt={product.title} className="w-full h-full object-cover" />
              </div>
              <div className="p-5 space-y-3">
                <h3 className="font-['Merriweather',serif] text-[#1a1a1a] min-h-[48px]">{product.title}</h3>
                <p className="text-[#1a1a1a]">{product.price}</p>
                <button className="text-[#d2a30b] text-sm flex items-center gap-2 hover:gap-3 transition-all">
                  Voir le produit
                  <ChevronRight size={14} />
                </button>
              </div>
            </div>
          ))}
        </div>
        
        <div className="text-center">
          <button 
            onClick={onNavigateAllProducts}
            className="bg-[#d2a30b] text-white px-8 py-3 rounded-lg hover:bg-[#b8900a] transition-colors inline-flex items-center gap-2"
          >
            Voir tous les produits
            <ChevronRight size={18} />
          </button>
        </div>
      </div>
    </section>
  );
}

function Categories() {
  const categories = [
    {
      icon: (
        <svg className="w-7 h-7" fill="none" viewBox="0 0 28 28">
          <path d={svgPaths.p8ca0c00} stroke="#155DFC" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2.33319" />
          <path d="M13.9992 20.9987H14.0108" stroke="#155DFC" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2.33319" />
        </svg>
      ),
      title: 'Applications mobiles',
      description: 'Apps prêtes à l\'emploi pour iOS et Android',
      color: 'bg-blue-50'
    },
    {
      icon: (
        <svg className="w-7 h-7" fill="none" viewBox="0 0 28 28">
          <path d="M13.9992 8.16626V24.4996" stroke="#00A63E" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2.33319" />
          <path d={svgPaths.pe1ae780} stroke="#00A63E" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2.33319" />
        </svg>
      ),
      title: 'Ebooks',
      description: 'Guides et formations pour développer vos compétences',
      color: 'bg-green-50'
    },
    {
      icon: (
        <svg className="w-7 h-7" fill="none" viewBox="0 0 28 28">
          <path d={svgPaths.p3d5e3580} stroke="#9810FA" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2.33319" />
          <path d="M3.49979 10.4994H24.4985" stroke="#9810FA" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2.33319" />
          <path d="M10.4994 24.4994V10.4994" stroke="#9810FA" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2.33319" />
        </svg>
      ),
      title: 'Templates',
      description: 'Designs professionnels pour vos projets web',
      color: 'bg-purple-50'
    }
  ];

  return (
    <section className="bg-white py-12 lg:py-20 px-4 lg:px-20">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-10 lg:mb-12">
          <h2 className="text-[#1a1a1a] mb-4">Catégories de produits</h2>
          <p className="text-[#4a5565] max-w-2xl mx-auto">
            Explorez notre sélection organisée de produits digitaux dans trois catégories principales
          </p>
        </div>
        
        <div className="grid md:grid-cols-3 gap-6">
          {categories.map((category, index) => (
            <div key={index} className="bg-white border border-gray-100 rounded-lg p-8 hover:shadow-lg transition-shadow">
              <div className={`w-16 h-16 ${category.color} rounded-lg flex items-center justify-center mb-6`}>
                {category.icon}
              </div>
              <h3 className="font-['Merriweather',serif] text-neutral-950 mb-3">{category.title}</h3>
              <p className="text-[#717182] mb-6">{category.description}</p>
              <button className="text-[#d2a30b] text-sm flex items-center gap-2 hover:gap-3 transition-all">
                Explorer
                <ChevronRight size={16} />
              </button>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

function DigitalPartner() {
  return (
    <section className="bg-gray-50 py-12 lg:py-20 px-4 lg:px-20">
      <div className="max-w-7xl mx-auto">
        <div className="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
          <div className="space-y-6">
            <h2 className="text-[#1a1a1a]">
              Digital Kappa, votre partenaire digital
            </h2>
            <p className="text-[#4a5565]">
              Chez Digital Kappa, nous créons et sélectionnons avec soin chaque produit digital pour répondre aux besoins des entrepreneurs, développeurs et créateurs modernes.
            </p>
            <p className="text-[#4a5565]">
              Notre mission est de vous faire gagner du temps en vous proposant des solutions prêtes à l&apos;emploi, testées et documentées.
            </p>
            <ul className="space-y-3">
              <li className="flex items-start gap-3">
                <svg className="w-5 h-5 mt-0.5 shrink-0" fill="none" viewBox="0 0 20 20">
                  <path d={svgPaths.p6c61c00} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.67" />
                  <path d={svgPaths.p6e678c0} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.67" />
                </svg>
                <span className="text-[#4a5565]">Produits testés et validés</span>
              </li>
              <li className="flex items-start gap-3">
                <svg className="w-5 h-5 mt-0.5 shrink-0" fill="none" viewBox="0 0 20 20">
                  <path d={svgPaths.p6c61c00} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.67" />
                  <path d={svgPaths.p6e678c0} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.67" />
                </svg>
                <span className="text-[#4a5565]">Documentation complète incluse</span>
              </li>
              <li className="flex items-start gap-3">
                <svg className="w-5 h-5 mt-0.5 shrink-0" fill="none" viewBox="0 0 20 20">
                  <path d={svgPaths.p6c61c00} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.67" />
                  <path d={svgPaths.p6e678c0} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.67" />
                </svg>
                <span className="text-[#4a5565]">Mises à jour régulières</span>
              </li>
              <li className="flex items-start gap-3">
                <svg className="w-5 h-5 mt-0.5 shrink-0" fill="none" viewBox="0 0 20 20">
                  <path d={svgPaths.p6c61c00} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.67" />
                  <path d={svgPaths.p6e678c0} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.67" />
                </svg>
                <span className="text-[#4a5565]">Support communautaire actif</span>
              </li>
            </ul>
          </div>
          
          <div className="relative h-[300px] lg:h-[400px] rounded-2xl overflow-hidden">
            <img src={imgImageDigitalKappa} alt="Digital Kappa Team" className="w-full h-full object-cover" />
          </div>
        </div>
      </div>
    </section>
  );
}

function FAQ() {
  const faqs = [
    {
      question: 'Comment acheter un produit ?',
      answer: 'Parcourez notre catalogue, sélectionnez le produit qui vous intéresse et cliquez sur "Acheter". Vous serez guidé à travers un processus de paiement sécurisé.'
    },
    {
      question: 'Puis-je obtenir un remboursement ?',
      answer: 'Oui, nous offrons une garantie satisfait ou remboursé de 30 jours sur tous nos produits.'
    },
    {
      question: 'Les produits sont-ils régulièrement mis à jour ?',
      answer: 'Absolument ! Tous nos produits reçoivent des mises à jour régulières gratuites.'
    }
  ];

  return (
    <section className="bg-white py-12 lg:py-20 px-4 lg:px-20">
      <div className="max-w-3xl mx-auto">
        <div className="text-center mb-10 lg:mb-12">
          <h2 className="text-[#1a1a1a] mb-4">Questions fréquentes</h2>
          <p className="text-[#4a5565]">Tout ce que vous devez savoir sur Digital Kappa</p>
        </div>
        
        <div className="space-y-6">
          {faqs.map((faq, index) => (
            <details key={index} className="bg-gray-50 rounded-lg p-6 group">
              <summary className="font-['Merriweather',serif] text-[#1a1a1a] cursor-pointer list-none flex items-center justify-between">
                {faq.question}
                <ChevronRight className="group-open:rotate-90 transition-transform" size={20} />
              </summary>
              <p className="mt-4 text-[#4a5565]">{faq.answer}</p>
            </details>
          ))}
        </div>
      </div>
    </section>
  );
}

function CTA() {
  return (
    <section className="bg-[#2b2d31] py-16 lg:py-24 px-4 lg:px-20">
      <div className="max-w-4xl mx-auto text-center space-y-6">
        <h2 className="text-white">
          Prêt à découvrir nos produits digitaux ?
        </h2>
        <p className="text-gray-300 max-w-2xl mx-auto">
          Rejoignez des centaines de développeurs et créateurs qui utilisent nos produits pour accélérer leurs projets
        </p>
        <div className="flex flex-col gap-6 justify-center items-center">
          <button className="bg-[#d2a30b] text-white px-8 py-3 rounded-lg hover:bg-[#b8900a] transition-colors w-full sm:w-auto">
            Explorer le catalogue
          </button>
          <div className="flex flex-col sm:flex-row gap-6 text-sm text-gray-400 w-full sm:w-auto justify-center">
            <div className="flex items-center gap-2 justify-center">
              <Shield className="w-5 h-5 flex-shrink-0" />
              <span>Paiement sécurisé</span>
            </div>
            <div className="flex items-center gap-2 justify-center">
              <Download className="w-5 h-5 flex-shrink-0" />
              <span>Téléchargement instantané</span>
            </div>
            <div className="flex items-center gap-2 justify-center">
              <Headphones className="w-5 h-5 flex-shrink-0" />
              <span>Support 24/7</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

function Footer() {
  return (
    <footer className="bg-[#1a1a1a] text-gray-400 py-12 px-4 lg:px-20">
      <div className="max-w-7xl mx-auto">
        <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
          <div>
            <Logo />
            <p className="mt-4 text-sm text-gray-400">
              Votre marketplace de produits digitaux premium
            </p>
          </div>
          
          <div>
            <h4 className="text-white mb-4">Pages</h4>
            <ul className="space-y-2 text-sm">
              <li><a href="#" className="hover:text-[#d2a30b]">Accueil</a></li>
              <li><a href="#" className="hover:text-[#d2a30b]">Produits</a></li>
              <li><a href="#" className="hover:text-[#d2a30b]">Blog</a></li>
              <li><a href="#" className="hover:text-[#d2a30b]">Contact</a></li>
            </ul>
          </div>
          
          <div>
            <h4 className="text-white mb-4">Catégories</h4>
            <ul className="space-y-2 text-sm">
              <li><a href="#" className="hover:text-[#d2a30b]">Applications</a></li>
              <li><a href="#" className="hover:text-[#d2a30b]">Ebooks</a></li>
              <li><a href="#" className="hover:text-[#d2a30b]">Templates</a></li>
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

export default function HomePage({ onNavigateHowItWorks, onNavigateAllProducts, onNavigateEbooks, onNavigateApplications, onNavigateTemplates, onNavigateFAQ }: HomePageProps) {
  return (
    <div className="min-h-screen">
      <Header 
        onNavigateHome={() => {}} 
        onNavigateHowItWorks={onNavigateHowItWorks}
        onNavigateAllProducts={onNavigateAllProducts}
        onNavigateEbooks={onNavigateEbooks}
        onNavigateApplications={onNavigateApplications}
        onNavigateTemplates={onNavigateTemplates}
        onNavigateFAQ={onNavigateFAQ}
        currentPage="home"
      />
      <Hero onNavigateHowItWorks={onNavigateHowItWorks} />
      <ValuePropositions />
      <ProductsSection onNavigateAllProducts={onNavigateAllProducts} />
      <Categories />
      <DigitalPartner />
      <FAQ />
      <CTA />
      <Footer />
    </div>
  );
}