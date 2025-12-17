import { useState } from 'react';
import { Download, Shield, HeadphonesIcon, Check, ChevronDown } from 'lucide-react';
import svgPaths from "./imports/svg-89uigzgcc4";
import Header from './components/Header';
import { getProductById, getSimilarProducts } from './data/products';
import ProductCard from './components/ProductCard';
import ProductCarousel from './components/ProductCarousel';

interface ProductDetailProps {
  productId: string;
  onNavigateHome: () => void;
  onNavigateHowItWorks: () => void;
  onNavigateAllProducts: () => void;
  onNavigateEbooks?: () => void;
  onNavigateApplications?: () => void;
  onNavigateTemplates?: () => void;
  onNavigateFAQ?: () => void;
  onNavigateProductDetail?: (productId: string) => void;
  onNavigateCheckout?: (productId: string) => void;
}

export default function ProductDetail({ 
  productId,
  onNavigateHome, 
  onNavigateHowItWorks, 
  onNavigateAllProducts,
  onNavigateEbooks,
  onNavigateApplications,
  onNavigateTemplates,
  onNavigateFAQ,
  onNavigateProductDetail,
  onNavigateCheckout
}: ProductDetailProps) {
  const [openFAQ, setOpenFAQ] = useState<number | null>(0);
  
  const product = getProductById(productId);
  const similarProducts = getSimilarProducts(productId, 3);
  
  if (!product) {
    return (
      <div className="min-h-screen bg-white flex items-center justify-center">
        <div className="text-center">
          <h1 className="text-[#1a1a1a] mb-4">Produit non trouvé</h1>
          <button 
            onClick={onNavigateAllProducts}
            className="bg-[#d2a30b] text-white px-6 py-3 rounded-lg hover:bg-[#b8900a] transition-colors"
          >
            Retour au catalogue
          </button>
        </div>
      </div>
    );
  }

  const faqItems = [
    {
      question: "Comment vais-je recevoir mon ebook ?",
      answer: "Immédiatement après votre paiement, vous recevrez un email avec un lien de téléchargement sécurisé. Le lien restera valable à vie et vous pourrez télécharger le produit autant de fois que nécessaire."
    },
    {
      question: "Le paiement est-il sécurisé ?",
      answer: "Absolument. Tous nos paiements sont traités via des systèmes sécurisés conformes aux normes PCI-DSS. Nous n'avons jamais accès à vos données bancaires qui sont entièrement cryptées."
    },
    {
      question: "Puis-je obtenir un remboursement ?",
      answer: "Oui, nous offrons une garantie satisfait ou remboursé de 14 jours. Si le produit ne répond pas à vos attentes, contactez notre support pour obtenir un remboursement intégral."
    },
    {
      question: "Dans quel format vais-je recevoir ce produit ?",
      answer: "Cet ebook est disponible en trois formats : PDF (pour lecture sur ordinateur), EPUB (pour liseuses et tablettes) et MOBI (pour Kindle). Vous recevrez les trois formats dans votre email."
    }
  ];

  return (
    <div className="min-h-screen bg-white">
      <Header 
        onNavigateHome={onNavigateHome}
        onNavigateHowItWorks={onNavigateHowItWorks}
        onNavigateAllProducts={onNavigateAllProducts}
        onNavigateEbooks={onNavigateEbooks}
        onNavigateApplications={onNavigateApplications}
        onNavigateTemplates={onNavigateTemplates}
        onNavigateFAQ={onNavigateFAQ}
        currentPage="all-products"
      />

      {/* Hero Section avec image et infos produit */}
      <section className="bg-gradient-to-b from-gray-50 to-white py-8 lg:py-16 px-4 lg:px-20">
        <div className="max-w-7xl mx-auto">
          <div className="grid lg:grid-cols-2 gap-8 lg:gap-16">
            {/* Image produit avec carrousel */}
            <div>
              <ProductCarousel 
                images={product.images || [product.image]} 
                productTitle={product.title}
              />
              <div className="flex items-center gap-2 mt-4 text-sm text-gray-600">
                <svg className="w-4 h-4" fill="none" viewBox="0 0 16 16">
                  <path d={svgPaths.p37f49070} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.33325" />
                </svg>
                <p>Paiement sécurisé • Téléchargement instantané</p>
              </div>
            </div>

            {/* Infos produit */}
            <div className="space-y-6">
              <div>
                <div className="inline-block bg-[rgba(210,163,11,0.1)] rounded-full px-4 py-1 mb-4">
                  <span className="text-sm text-[#d2a30b] font-['Montserrat',sans-serif]">{product.category}</span>
                </div>
                <h1 className="text-[#1a1a1a] mb-4">
                  {product.title}
                </h1>
                <p className="text-lg text-gray-600">
                  {product.description}
                </p>
              </div>

              {/* Prix et bouton */}
              <div className="border-t border-b border-gray-200 py-6 space-y-6">
                <div>
                  <p className="text-sm text-gray-600 mb-1">Prix</p>
                  <p className="text-4xl text-[#1a1a1a] font-['Montserrat',sans-serif]">{product.price}</p>
                </div>

                <button className="w-full bg-[#d2a30b] text-white py-4 rounded-lg hover:bg-[#b8900a] transition-colors font-['Montserrat',sans-serif] font-semibold" onClick={() => onNavigateCheckout?.(productId)}>
                  Acheter maintenant
                </button>

                <p className="text-xs text-center text-gray-500">
                  Accès instantané après paiement • Garantie satisfait ou remboursé 14 jours
                </p>
              </div>

              {/* Features */}
              <div className="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div className="text-center">
                  <div className="mx-auto mb-3">
                    <svg className="w-6 h-6 mx-auto" fill="none" viewBox="0 0 24 24">
                      <path d="M11.9993 14.9998V2.99982" stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.99988" />
                      <path d={svgPaths.p740c900} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.99988" />
                      <path d={svgPaths.p104f2800} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.99988" />
                    </svg>
                  </div>
                  <p className="text-xs text-gray-600">Téléchargement instantané</p>
                </div>

                <div className="text-center">
                  <div className="mx-auto mb-3">
                    <svg className="w-6 h-6 mx-auto" fill="none" viewBox="0 0 24 24">
                      <path d={svgPaths.p36ab380} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.99988" />
                    </svg>
                  </div>
                  <p className="text-xs text-gray-600">Paiement sécurisé</p>
                </div>

                <div className="text-center">
                  <div className="mx-auto mb-3">
                    <svg className="w-6 h-6 mx-auto" fill="none" viewBox="0 0 24 24">
                      <path d={svgPaths.p9fdb100} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.99988" />
                      <path d={svgPaths.p2e4e5700} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.99988" />
                      <path d={svgPaths.p3ce8ab00} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.99988" />
                      <path d={svgPaths.p3ee33600} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.99988" />
                    </svg>
                  </div>
                  <p className="text-xs text-gray-600">Garantie 14 jours</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Description complète */}
      <section className="py-12 lg:py-16 px-4 lg:px-20 bg-white">
        <div className="max-w-5xl mx-auto">
          <h2 className="text-[#1a1a1a] mb-4">
            Description complète
          </h2>
          <p className="text-gray-700 leading-relaxed">
            Guide complet de 250+ pages couvrant les outils, pratiques et méthodologies du développement moderne. Des bases aux techniques avancées, avec exemples pratiques et projets réels.
          </p>
        </div>
      </section>

      {/* Fonctionnalités principales */}
      <section className="py-12 lg:py-16 px-4 lg:px-20 bg-gray-50">
        <div className="max-w-5xl mx-auto">
          <h2 className="text-[#1a1a1a] mb-6">
            Fonctionnalités principales
          </h2>
          
          <div className="grid sm:grid-cols-2 gap-4">
            {[
              "250+ pages de contenu",
              "10 chapitres détaillés",
              "Exemples de code pratiques",
              "Projets réels inclus",
              "Formats PDF, EPUB, MOBI",
              "Mises à jour gratuites à vie",
              "Ressources téléchargeables",
              "Accès à la communauté"
            ].map((feature, index) => (
              <div key={index} className="flex items-start gap-3">
                <svg className="w-5 h-5 shrink-0 mt-0.5" fill="none" viewBox="0 0 20 20">
                  <path d={svgPaths.p3bb886c0} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.66657" />
                </svg>
                <span className="text-gray-700">{feature}</span>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Ce qui est inclus */}
      <section className="py-12 lg:py-16 px-4 lg:px-20 bg-white">
        <div className="max-w-5xl mx-auto">
          <h2 className="text-[#1a1a1a] mb-6">
            Ce qui est inclus
          </h2>
          
          <div className="bg-gray-50 rounded-2xl p-6 lg:p-8 space-y-4">
            {[
              "Ebook complet (PDF, EPUB, MOBI)",
              "Code source des exemples",
              "Fiches récapitulatives PDF",
              "Accès communauté Discord",
              "Mises à jour gratuites"
            ].map((item, index) => (
              <div key={index} className="flex items-start gap-3">
                <Check className="w-5 h-5 shrink-0 mt-0.5 text-[#d2a30b]" />
                <span className="text-gray-700">{item}</span>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Prérequis */}
      <section className="py-12 lg:py-16 px-4 lg:px-20 bg-gray-50">
        <div className="max-w-5xl mx-auto">
          <h2 className="text-[#1a1a1a] mb-6">
            Prérequis
          </h2>
          
          <ul className="space-y-3">
            {[
              "Connaissances de base en programmation",
              "Motivation pour apprendre"
            ].map((item, index) => (
              <li key={index} className="flex items-start gap-3">
                <span className="text-[#d2a30b] shrink-0">•</span>
                <span className="text-gray-700">{item}</span>
              </li>
            ))}
          </ul>
        </div>
      </section>

      {/* Questions fréquentes */}
      <section className="py-12 lg:py-16 px-4 lg:px-20 bg-white">
        <div className="max-w-3xl mx-auto">
          <div className="text-center mb-12">
            <div className="inline-block bg-[rgba(210,163,11,0.1)] rounded-full px-4 py-2 mb-4">
              <span className="text-sm text-[#d2a30b] font-['Montserrat',sans-serif]">Support</span>
            </div>
            <h2 className="text-[#1a1a1a] mb-4">
              Questions fréquentes
            </h2>
            <p className="text-gray-600">
              Retrouvez les réponses aux questions les plus courantes sur ce produit
            </p>
          </div>

          <div className="space-y-4">
            {faqItems.map((faq, index) => (
              <div key={index} className="border border-gray-200 rounded-lg overflow-hidden">
                <button
                  onClick={() => setOpenFAQ(openFAQ === index ? null : index)}
                  className="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors"
                >
                  <span className="text-[#1a1a1a] pr-4">{faq.question}</span>
                  <ChevronDown 
                    className={`w-5 h-5 text-[#d2a30b] shrink-0 transition-transform ${openFAQ === index ? 'rotate-180' : ''}`}
                  />
                </button>
                {openFAQ === index && (
                  <div className="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <p className="text-gray-700">{faq.answer}</p>
                  </div>
                )}
              </div>
            ))}
          </div>

          <div className="text-center mt-8">
            <button className="text-[#d2a30b] hover:underline font-['Montserrat',sans-serif]">
              Voir toutes les questions →
            </button>
          </div>
        </div>
      </section>

      {/* Achat sécurisé */}
      <section className="py-12 lg:py-16 px-4 lg:px-20 bg-[#2b2d31]">
        <div className="max-w-4xl mx-auto">
          <h2 className="text-white text-center mb-8">
            Achat sécurisé et téléchargement immédiat de vos produits digitaux
          </h2>

          <div className="space-y-6 text-gray-300">
            <p>
              Digital Kappa vous offre une expérience sécurisée lors de vos achats de produits digitaux. Que vous achetiez des applications mobiles, des ebooks ou des templates, vos transactions sont protégées par les meilleurs standards de sécurité du marché.
            </p>

            <p>
              Chaque fois que vous finalisez votre achat, vous êtes redirigé vers une page de paiement entièrement cryptée. Les informations bancaires ne transitent jamais par nos serveurs et votre confidentialité est garantie.
            </p>

            <p>
              Tous vos achats sont aussi sauvegardés dans votre espace personnel. Vous pourrez consulter à tout moment les détails de vos commandes, accéder aux fichiers téléchargeables et retrouver tous les documents juridiques concernant vos transactions.
            </p>

            <p>
              L&apos;intégralité des vendeurs sur Digital Kappa est soumise à une validation stricte. Nous ne référençons que des créateurs fiables, ayant fait leurs preuves dans leurs domaines respectifs. Chaque produit est testé avant sa mise en ligne pour vous garantir un produit de qualité.
            </p>

            <p>
              Nous avons également mis en place des moyens de communication directs entre vous et les vendeurs. Si vous avez la moindre question technique ou si vous souhaitez obtenir des précisions sur un produit, vous pourrez échanger facilement via notre messagerie interne.
            </p>

            <p>
              Enfin, nous proposons une garantie satisfait ou remboursé sur l&apos;ensemble de nos produits. Si un article ne correspond pas à vos attentes ou présente un défaut non mentionné, notre équipe support interviendra pour trouver la meilleure solution : échange, remboursement ou assistance technique.
            </p>
          </div>

          <div className="mt-10 text-center">
            <button className="bg-[#d2a30b] text-white px-8 py-3 rounded-lg hover:bg-[#b8900a] transition-colors font-['Montserrat',sans-serif] font-semibold">
              Acheter maintenant
            </button>
          </div>
        </div>
      </section>

      {/* Produits similaires */}
      <section className="py-12 lg:py-16 px-4 lg:px-20 bg-gray-50">
        <div className="max-w-5xl mx-auto">
          <h2 className="text-[#1a1a1a] mb-6">
            Produits similaires
          </h2>
          
          <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            {similarProducts.map((similarProduct) => (
              <ProductCard
                key={similarProduct.id}
                product={similarProduct}
                onProductClick={() => onNavigateProductDetail?.(similarProduct.id)}
              />
            ))}
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-[#1a1a1a] text-gray-400 py-12 px-4 lg:px-20">
        <div className="max-w-7xl mx-auto">
          <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <div>
              <div className="mb-4">
                <div className="flex items-center gap-2">
                  <div className="w-8 h-8 bg-[#d2a30b] rounded flex items-center justify-center">
                    <span className="text-white text-sm">DK</span>
                  </div>
                  <span className="text-white font-['Montserrat',sans-serif]">Digital Kappa</span>
                </div>
              </div>
              <p className="text-sm text-gray-400">
                Votre marketplace de produits digitaux premium
              </p>
            </div>
            
            <div>
              <h4 className="text-white mb-4">Pages</h4>
              <ul className="space-y-2 text-sm">
                <li><button onClick={onNavigateHome} className="hover:text-[#d2a30b]">Accueil</button></li>
                <li><button onClick={onNavigateAllProducts} className="hover:text-[#d2a30b]">Produits</button></li>
                <li><a href="#" className="hover:text-[#d2a30b]">Blog</a></li>
                <li><a href="#" className="hover:text-[#d2a30b]">Contact</a></li>
              </ul>
            </div>
            
            <div>
              <h4 className="text-white mb-4">Catégories</h4>
              <ul className="space-y-2 text-sm">
                <li><button onClick={onNavigateApplications} className="hover:text-[#d2a30b]">Applications</button></li>
                <li><button onClick={onNavigateEbooks} className="hover:text-[#d2a30b]">Ebooks</button></li>
                <li><button onClick={onNavigateTemplates} className="hover:text-[#d2a30b]">Templates</button></li>
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
    </div>
  );
}