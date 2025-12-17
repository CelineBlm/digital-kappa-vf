import { useState } from 'react';
import { ChevronRight, MessageCircle, Mail } from 'lucide-react';
import Header from './components/Header';

interface FAQProps {
  onNavigateHome: () => void;
  onNavigateHowItWorks: () => void;
  onNavigateAllProducts: () => void;
  onNavigateEbooks?: () => void;
  onNavigateApplications?: () => void;
  onNavigateTemplates?: () => void;
  onNavigateFAQ?: () => void;
}

type Category = 'all' | 'general' | 'payment' | 'products' | 'support';

interface FAQItem {
  question: string;
  answer: string;
  category: Category;
}

const faqData: FAQItem[] = [
  // Général
  {
    question: "Qu'est-ce que Digital Kappa ?",
    answer: "Digital Kappa est une marketplace de produits digitaux proposant des applications mobiles, des ebooks et des templates. Notre mission est de vous fournir des ressources numériques de qualité, simples et prêtes à l'emploi pour gagner du temps dans vos projets.",
    category: 'general'
  },
  {
    question: "Comment fonctionne le téléchargement ?",
    answer: "Une fois votre achat effectué, vous recevez immédiatement un email avec un lien de téléchargement sécurisé. Vous pouvez également retrouver tous vos produits dans votre compte utilisateur, accessible à tout moment. Les téléchargements sont illimités et sans date d'expiration.",
    category: 'general'
  },
  {
    question: "Puis-je télécharger mes produits plusieurs fois ?",
    answer: "Oui, absolument ! Une fois que vous avez acheté un produit, vous pouvez le télécharger autant de fois que nécessaire depuis votre espace client. Vos achats restent disponibles indéfiniment.",
    category: 'general'
  },
  
  // Paiement
  {
    question: "Quels moyens de paiement acceptez-vous ?",
    answer: "Nous acceptons les cartes bancaires (Visa, Mastercard, American Express), PayPal, et les virements bancaires. Tous les paiements sont sécurisés via notre plateforme de paiement certifiée.",
    category: 'payment'
  },
  {
    question: "Les prix sont-ils TTC ?",
    answer: "Oui, tous les prix affichés sur Digital Kappa sont TTC (Toutes Taxes Comprises). Il n'y a aucun frais caché. Le prix que vous voyez est le prix final que vous payez.",
    category: 'payment'
  },
  {
    question: "Puis-je obtenir une facture ?",
    answer: "Oui, une facture détaillée est générée automatiquement après chaque achat et envoyée par email. Vous pouvez également la télécharger depuis votre compte utilisateur à tout moment.",
    category: 'payment'
  },
  
  // Produits
  {
    question: "Vos produits sont-ils compatibles avec Mac et PC ?",
    answer: "La majorité de nos produits sont compatibles avec les deux systèmes. Les ebooks sont au format PDF universel, les templates sont basés sur des technologies web standards, et pour les applications, nous précisons toujours les systèmes compatibles sur chaque fiche produit.",
    category: 'products'
  },
  {
    question: "Proposez-vous des mises à jour pour vos produits ?",
    answer: "Oui, tous nos produits bénéficient de mises à jour gratuites. Vous recevez automatiquement un email lorsqu'une nouvelle version est disponible, et vous pouvez la télécharger gratuitement depuis votre compte.",
    category: 'products'
  },
  {
    question: "Puis-je utiliser les produits à des fins commerciales ?",
    answer: "Cela dépend du produit et de la licence associée. La plupart de nos produits incluent une licence commerciale étendue, mais nous vous recommandons de vérifier les conditions spécifiques de chaque produit sur sa page de description.",
    category: 'products'
  },
  
  // Support
  {
    question: "Comment obtenir de l'aide ?",
    answer: "Notre équipe support est disponible par email à support@digitalkappa.com. Nous répondons généralement sous 24h en semaine. Vous pouvez également consulter notre documentation en ligne ou utiliser le chat en direct pour une assistance immédiate.",
    category: 'support'
  },
  {
    question: "Proposez-vous un support technique ?",
    answer: "Oui, notre équipe technique est là pour vous aider avec tous vos produits Digital Kappa. Nous offrons un support par email, chat, et pour certains produits premium, une assistance vidéo personnalisée.",
    category: 'support'
  },
  {
    question: "Quelle est votre politique de remboursement ?",
    answer: "Nous offrons une garantie satisfait ou remboursé de 30 jours sur tous nos produits. Si vous n'êtes pas satisfait, contactez-nous et nous vous rembourserons intégralement, sans poser de questions.",
    category: 'support'
  }
];

function FAQAccordion({ item, isOpen, onToggle }: { item: FAQItem; isOpen: boolean; onToggle: () => void }) {
  return (
    <div className="bg-white border border-gray-200 rounded-2xl overflow-hidden">
      <button
        onClick={onToggle}
        className="w-full px-6 py-5 flex items-center justify-between hover:bg-gray-50 transition-colors text-left"
      >
        <span className="font-['Montserrat',sans-serif] text-[#0d1421] pr-4">{item.question}</span>
        <div className="flex-shrink-0">
          {isOpen ? (
            <svg width="20" height="20" fill="none" viewBox="0 0 20 20">
              <path d="M4.166 10h11.667" stroke="#D2A30B" strokeWidth="1.667" strokeLinecap="round" strokeLinejoin="round" />
            </svg>
          ) : (
            <svg width="20" height="20" fill="none" viewBox="0 0 20 20">
              <path d="M4.166 10h11.667" stroke="#D2A30B" strokeWidth="1.667" strokeLinecap="round" strokeLinejoin="round" />
              <path d="M10 4.166v11.667" stroke="#D2A30B" strokeWidth="1.667" strokeLinecap="round" strokeLinejoin="round" />
            </svg>
          )}
        </div>
      </button>
      {isOpen && (
        <div className="px-6 pb-6">
          <p className="text-[#0d1421]/70 leading-relaxed">{item.answer}</p>
        </div>
      )}
    </div>
  );
}

function Footer() {
  return (
    <footer className="bg-[#1a1a1a] text-gray-300 py-12 lg:py-16 px-4 lg:px-20">
      <div className="max-w-7xl mx-auto">
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-8">
          <div>
            <div className="flex items-center gap-2 mb-4">
              <div className="w-8 h-8 bg-[#d2a30b] rounded flex items-center justify-center">
                <span className="text-white font-bold text-sm">DK</span>
              </div>
              <h4 className="text-white font-['Montserrat',sans-serif]">Digital Kappa</h4>
            </div>
            <p className="text-sm text-gray-400">
              Marketplace de produits digitaux de qualité pour gagner du temps dans vos projets.
            </p>
          </div>
          
          <div>
            <h4 className="text-white mb-4 font-['Montserrat',sans-serif]">Légal</h4>
            <ul className="space-y-2 text-sm">
              <li><a href="#" className="hover:text-[#d2a30b] transition-colors">CGV</a></li>
              <li><a href="#" className="hover:text-[#d2a30b] transition-colors">CGU</a></li>
              <li><a href="#" className="hover:text-[#d2a30b] transition-colors">Confidentialité</a></li>
            </ul>
          </div>
          
          <div>
            <h4 className="text-white mb-4 font-['Montserrat',sans-serif]">Ressources</h4>
            <ul className="space-y-2 text-sm">
              <li><a href="#" className="hover:text-[#d2a30b] transition-colors">Centre d&apos;aide</a></li>
              <li><a href="#" className="hover:text-[#d2a30b] transition-colors">Tutoriels</a></li>
              <li><a href="#" className="hover:text-[#d2a30b] transition-colors">Support</a></li>
            </ul>
          </div>
          
          <div>
            <h4 className="text-white mb-4 font-['Montserrat',sans-serif]">Contact</h4>
            <ul className="space-y-2 text-sm">
              <li className="flex items-center gap-2">
                <Mail size={16} className="text-[#d2a30b]" />
                <span>Email</span>
              </li>
              <li className="text-gray-400">support@digitalkappa.com</li>
              <li className="flex items-center gap-2 mt-3">
                <MessageCircle size={16} className="text-[#d2a30b]" />
                <a href="#" className="hover:text-[#d2a30b] transition-colors">Chat en direct</a>
              </li>
            </ul>
          </div>
        </div>
        
        <div className="border-t border-gray-700 pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-sm">
          <p className="text-gray-400">&copy; 2025 Digital Kappa. Tous droits réservés.</p>
          <div className="flex gap-6">
            <a href="#" className="hover:text-[#d2a30b] transition-colors">CGU</a>
            <a href="#" className="hover:text-[#d2a30b] transition-colors">Politique de confidentialité</a>
          </div>
        </div>
      </div>
    </footer>
  );
}

export default function FAQ({ onNavigateHome, onNavigateHowItWorks, onNavigateAllProducts, onNavigateEbooks, onNavigateApplications, onNavigateTemplates }: FAQProps) {
  const [activeCategory, setActiveCategory] = useState<Category>('all');
  const [openIndex, setOpenIndex] = useState<number>(0);

  const categories = [
    { id: 'all' as Category, label: 'Toutes' },
    { id: 'general' as Category, label: 'Général' },
    { id: 'payment' as Category, label: 'Paiement' },
    { id: 'products' as Category, label: 'Produits' },
    { id: 'support' as Category, label: 'Support' }
  ];

  const filteredFAQs = activeCategory === 'all' 
    ? faqData 
    : faqData.filter(faq => faq.category === activeCategory);

  const categoryTitle = categories.find(cat => cat.id === activeCategory)?.label || 'Toutes';

  return (
    <div className="min-h-screen bg-white">
      <Header 
        onNavigateHome={onNavigateHome}
        onNavigateHowItWorks={onNavigateHowItWorks}
        onNavigateAllProducts={onNavigateAllProducts}
        onNavigateEbooks={onNavigateEbooks}
        onNavigateApplications={onNavigateApplications}
        onNavigateTemplates={onNavigateTemplates}
        onNavigateFAQ={() => {}}
        currentPage="faq"
      />

      {/* Hero Section */}
      <section className="bg-gray-50 py-12 lg:py-20 px-4 lg:px-20 border-b border-gray-100">
        <div className="max-w-4xl mx-auto text-center">
          <div className="inline-flex items-center gap-2 bg-[rgba(210,163,11,0.1)] rounded-full px-6 py-2 mb-6">
            <p className="text-sm text-[#d2a30b] font-['Montserrat',sans-serif]">Aide & Support</p>
          </div>
          <h1 className="text-[#1a1a1a] mb-4">Questions Fréquentes</h1>
          <p className="text-[#4a5565] text-lg lg:text-xl font-['Montserrat',sans-serif]">
            Trouvez rapidement les réponses à vos questions
          </p>
        </div>
      </section>

      {/* Category Tabs */}
      <section className="py-8 px-4 lg:px-20 border-b border-gray-100">
        <div className="max-w-4xl mx-auto">
          {/* Mobile Dropdown */}
          <div className="lg:hidden">
            <select
              value={activeCategory}
              onChange={(e) => {
                setActiveCategory(e.target.value as Category);
                setOpenIndex(-1);
              }}
              className="w-full px-4 py-3 border border-gray-200 rounded-lg font-['Montserrat',sans-serif] text-[#364153] bg-white focus:outline-none focus:ring-2 focus:ring-[#d2a30b] focus:border-transparent"
            >
              {categories.map(cat => (
                <option key={cat.id} value={cat.id}>{cat.label}</option>
              ))}
            </select>
          </div>

          {/* Desktop Tabs */}
          <div className="hidden lg:flex gap-3 flex-wrap justify-center">
            {categories.map(cat => (
              <button
                key={cat.id}
                onClick={() => {
                  setActiveCategory(cat.id);
                  setOpenIndex(-1);
                }}
                className={`px-6 py-3 rounded-lg font-['Montserrat',sans-serif] transition-all ${
                  activeCategory === cat.id
                    ? 'bg-[#d2a30b] text-white shadow-md'
                    : 'bg-white border border-gray-200 text-[#364153] hover:border-[#d2a30b] hover:text-[#d2a30b]'
                }`}
              >
                {cat.label}
              </button>
            ))}
          </div>
        </div>
      </section>

      {/* FAQ List */}
      <section className="py-12 lg:py-16 px-4 lg:px-20">
        <div className="max-w-4xl mx-auto">
          <h2 className="text-[#0d1421] mb-8">
            {categoryTitle}
          </h2>
          
          <div className="space-y-4">
            {filteredFAQs.map((faq, index) => (
              <FAQAccordion
                key={index}
                item={faq}
                isOpen={openIndex === index}
                onToggle={() => setOpenIndex(openIndex === index ? -1 : index)}
              />
            ))}
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-12 lg:py-16 px-4 lg:px-20">
        <div className="max-w-4xl mx-auto">
          <div className="bg-[#2c3340] rounded-3xl p-8 lg:p-12 text-center">
            <h2 className="text-white mb-3">
              Vous ne trouvez pas votre réponse ?
            </h2>
            <p className="text-gray-300 mb-8 font-['Montserrat',sans-serif]">
              Notre équipe est là pour vous aider
            </p>
            
            <div className="flex flex-col sm:flex-row gap-4 justify-center">
              <button className="bg-[#d2a30b] text-white px-8 py-4 rounded-xl hover:bg-[#b8900a] transition-colors font-['Montserrat',sans-serif] flex items-center justify-center gap-2">
                <Mail size={20} />
                Contacter l&apos;équipe
              </button>
              <button className="bg-white/10 border border-white/20 text-white px-8 py-4 rounded-xl hover:bg-white/20 transition-colors font-['Montserrat',sans-serif] flex items-center justify-center gap-2">
                <MessageCircle size={20} />
                Chat en direct
              </button>
            </div>
          </div>
        </div>
      </section>

      {/* Footer */}
      <Footer />
    </div>
  );
}