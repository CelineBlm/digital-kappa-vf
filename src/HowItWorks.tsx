import { ChevronRight, Shield, Download, CreditCard, Search, Award, Lock, MessageCircle } from 'lucide-react';
import svgPaths from "./imports/svg-a26rkphtbb";
import imgImageProcessusDachatSimplifie from "figma:asset/b854e356a4723af7606bc1c6a6d9ae5f581b89d1.png";
import Header from './components/Header';

interface HowItWorksProps {
  onNavigateHome: () => void;
  onNavigateHowItWorks: () => void;
  onNavigateAllProducts: () => void;
  onNavigateEbooks?: () => void;
  onNavigateApplications?: () => void;
  onNavigateTemplates?: () => void;
  onNavigateFAQ?: () => void;
}

function HeroSection() {
  return (
    <section className="bg-gray-50 relative overflow-hidden px-4 lg:px-20 py-12 lg:py-20">
      <div className="max-w-4xl mx-auto text-center space-y-6">
        <div className="inline-flex items-center gap-2 bg-white border border-gray-100 rounded-full px-4 py-2 shadow-sm">
          <div className="w-2 h-2 bg-[#d2a30b] rounded-full"></div>
          <p className="text-sm text-[#0d1421]">Simple et sécurisé</p>
        </div>
        
        <h1 className="text-[#0d1421]">
          Comment ça marche ?
        </h1>
        
        <p className="text-[rgba(13,20,33,0.7)] max-w-2xl mx-auto">
          Achetez et téléchargez vos produits digitaux en quelques clics. Notre processus simplifié vous garantit un accès immédiat à vos achats.
        </p>
      </div>
      
      {/* Decorative blur */}
      <div className="absolute top-0 right-0 lg:right-1/4 w-64 h-64 bg-[rgba(210,163,11,0.05)] rounded-full blur-3xl -z-10"></div>
    </section>
  );
}

function ProcessSteps() {
  const steps = [
    {
      number: 1,
      icon: (
        <svg className="w-10 h-10" fill="none" viewBox="0 0 40 40">
          <path d={svgPaths.pbe0600} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="3.33313" />
          <path d={svgPaths.p32fa0280} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="3.33313" />
        </svg>
      ),
      title: 'Parcourez',
      description: 'Explorez notre catalogue de produits digitaux : applications, ebooks et templates. Utilisez les filtres pour trouver exactement ce dont vous avez besoin.'
    },
    {
      number: 2,
      icon: (
        <svg className="w-10 h-10" fill="none" viewBox="0 0 40 40">
          <path d={svgPaths.p3290c480} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="3.33313" />
          <path d="M3.33311 16.6657H36.6645" stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="3.33313" />
        </svg>
      ),
      title: 'Achetez en un clic',
      description: 'Pas de compte requis. Cliquez sur "Acheter maintenant", renseignez votre email et réglez en toute sécurité via notre système de paiement sécurisé.'
    },
    {
      number: 3,
      icon: (
        <svg className="w-10 h-10" fill="none" viewBox="0 0 40 40">
          <path d="M19.9988 24.9985V4.9997" stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="3.33313" />
          <path d={svgPaths.p175a2e80} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="3.33313" />
          <path d={svgPaths.p19a88f00} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="3.33313" />
        </svg>
      ),
      title: 'Téléchargez',
      description: 'Accédez immédiatement à votre produit après le paiement. Recevez un email de confirmation avec un lien de téléchargement valable à vie.'
    }
  ];

  return (
    <section className="bg-white py-12 lg:py-20 px-4 lg:px-20">
      <div className="max-w-7xl mx-auto">
        <div className="grid md:grid-cols-3 gap-8 lg:gap-12 relative">
          {steps.map((step, index) => (
            <div key={index} className="relative">
              {/* Connector line - desktop only */}
              {index < steps.length - 1 && (
                <div className="hidden md:block absolute top-10 left-full w-full h-0.5 bg-gradient-to-r from-[#d2a30b] to-transparent -translate-x-1/2 z-0"></div>
              )}
              
              <div className="relative z-10 text-center">
                <div className="bg-white border border-gray-100 rounded-2xl p-1.5 w-20 h-20 flex items-center justify-center mx-auto mb-6 shadow-sm">
                  {step.icon}
                </div>
                
                <div className="bg-[#d2a30b] w-8 h-8 rounded-full flex items-center justify-center mx-auto mb-6">
                  <span className="text-white">{step.number}</span>
                </div>
                
                <h3 className="font-['Merriweather',serif] text-[#0d1421] mb-4">{step.title}</h3>
                
                <p className="text-[rgba(13,20,33,0.7)]">{step.description}</p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

function SimplifiedProcess() {
  const features = [
    {
      icon: (
        <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24">
          <path d={svgPaths.p29eafd00} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.99988" />
          <path d={svgPaths.p6c61c00} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.99988" />
        </svg>
      ),
      title: 'Sans création de compte',
      description: 'Un simple email suffit pour finaliser votre achat'
    },
    {
      icon: (
        <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24">
          <path d={svgPaths.p2e1ef140} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.99988" />
          <path d={svgPaths.p29eafd00} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.99988" />
        </svg>
      ),
      title: 'Accès instantané',
      description: 'Téléchargez votre produit immédiatement après le paiement'
    },
    {
      icon: (
        <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24">
          <path d={svgPaths.p2303d100} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.99988" />
          <path d={svgPaths.p38aa6800} stroke="#D2A30B" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.99988" />
        </svg>
      ),
      title: 'Paiement 100% sécurisé',
      description: 'Vos données sont protégées par un cryptage de niveau bancaire'
    }
  ];

  return (
    <section className="bg-gray-50 py-12 lg:py-20 px-4 lg:px-20">
      <div className="max-w-7xl mx-auto">
        <div className="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
          <div className="space-y-6 order-2 lg:order-1">
            <h2 className="text-[#0d1421]">
              <div>Un processus d&apos;achat</div>
              <div className="text-[#d2a30b]">ultra-simplifié</div>
            </h2>
            
            <p className="text-[rgba(13,20,33,0.7)]">
              Nous avons conçu notre plateforme pour éliminer toute friction entre vous et vos produits digitaux. Pas de création de compte fastidieuse, pas de panier compliqué.
            </p>
            
            <div className="space-y-4">
              {features.map((feature, index) => (
                <div key={index} className="flex gap-4">
                  <div className="shrink-0 mt-1">
                    {feature.icon}
                  </div>
                  <div>
                    <h4 className="text-[#0d1421] mb-1">{feature.title}</h4>
                    <p className="text-sm text-[rgba(13,20,33,0.7)]">{feature.description}</p>
                  </div>
                </div>
              ))}
            </div>
          </div>
          
          <div className="order-1 lg:order-2">
            <div className="rounded-2xl overflow-hidden shadow-2xl">
              <img 
                src={imgImageProcessusDachatSimplifie} 
                alt="Processus d'achat simplifié" 
                className="w-full h-auto"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

function SecuritySection() {
  const securityFeatures = [
    {
      icon: <Shield className="w-8 h-8" />,
      title: 'Cryptage SSL',
      description: 'Toutes les transactions sont sécurisées'
    },
    {
      icon: <CreditCard className="w-8 h-8" />,
      title: 'Paiement sécurisé',
      description: 'Nous ne stockons aucune donnée bancaire'
    },
    {
      icon: <Download className="w-8 h-8" />,
      title: 'Accès à vie',
      description: 'Téléchargez vos produits quand vous voulez'
    }
  ];

  return (
    <section className="bg-white py-12 lg:py-20 px-4 lg:px-20">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-12">
          <h2 className="text-[#0d1421] mb-4">
            Vos achats en toute sécurité
          </h2>
          <p className="text-[rgba(13,20,33,0.7)] max-w-2xl mx-auto">
            Nous prenons la sécurité de vos données et de vos paiements très au sérieux. Voici nos garanties.
          </p>
        </div>
        
        <div className="grid md:grid-cols-3 gap-8">
          {securityFeatures.map((feature, index) => (
            <div key={index} className="bg-gray-50 rounded-xl p-6 text-center">
              <div className="w-16 h-16 bg-[rgba(210,163,11,0.1)] rounded-full flex items-center justify-center mx-auto mb-4 text-[#d2a30b]">
                {feature.icon}
              </div>
              <h3 className="text-[#0d1421] mb-2">{feature.title}</h3>
              <p className="text-sm text-[rgba(13,20,33,0.7)]">{feature.description}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

function FAQ() {
  const faqs = [
    {
      question: 'Dois-je créer un compte pour acheter ?',
      answer: 'Non, aucun compte n\'est nécessaire. Un simple email suffit pour recevoir votre produit.'
    },
    {
      question: 'Quels moyens de paiement acceptez-vous ?',
      answer: 'Nous acceptons les cartes bancaires (Visa, Mastercard, American Express) et PayPal.'
    },
    {
      question: 'Combien de temps le lien de téléchargement est-il valable ?',
      answer: 'Votre lien de téléchargement est valable à vie. Vous pouvez télécharger votre produit autant de fois que nécessaire.'
    },
    {
      question: 'Puis-je obtenir une facture ?',
      answer: 'Oui, une facture est automatiquement générée et envoyée par email après chaque achat.'
    },
    {
      question: 'Que faire si je n\'ai pas reçu mon email de confirmation ?',
      answer: 'Vérifiez d\'abord votre dossier spam. Si vous ne trouvez toujours rien, contactez notre support qui vous renverra votre lien.'
    },
    {
      question: 'Les produits sont-ils remboursables ?',
      answer: 'Oui, nous offrons une garantie satisfait ou remboursé de 30 jours sur tous nos produits.'
    }
  ];

  return (
    <section className="bg-gray-50 py-12 lg:py-20 px-4 lg:px-20">
      <div className="max-w-3xl mx-auto">
        <div className="text-center mb-12">
          <h2 className="text-[#0d1421] mb-4">
            Questions fréquentes
          </h2>
        </div>
        
        <div className="space-y-4">
          {faqs.map((faq, index) => (
            <details key={index} className="bg-white rounded-lg p-6 group">
              <summary className="text-[#0d1421] cursor-pointer list-none flex items-center justify-between">
                <span>{faq.question}</span>
                <ChevronRight className="group-open:rotate-90 transition-transform shrink-0 ml-4" size={20} />
              </summary>
              <p className="mt-4 text-[rgba(13,20,33,0.7)]">{faq.answer}</p>
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
        <div className="flex flex-col sm:flex-row gap-4 justify-center">
          <button className="bg-[#d2a30b] text-white px-8 py-3 rounded-lg hover:bg-[#b8900a] transition-colors">
            Explorer le catalogue
          </button>
          <button className="bg-white text-[#2b2d31] px-8 py-3 rounded-lg hover:bg-gray-100 transition-colors">
            Contactez-nous
          </button>
        </div>
      </div>
    </section>
  );
}

function BySection() {
  const highlights = [
    {
      icon: <Award className="w-6 h-6" />,
      title: 'Qualité garantie',
      description: 'Nos produits digitaux sont soumis à des critères stricts de qualité. Ils sont testés, validés et régulièrement mis à jour pour garantir votre satisfaction.'
    },
    {
      icon: <Lock className="w-6 h-6" />,
      title: 'Transactions sécurisées',
      description: 'Lorsque vous effectuez un achat, les documents juridiques concernant votre transaction sont sauvegardés dans votre espace personnel pour une consultation à tout moment.'
    },
    {
      icon: <MessageCircle className="w-6 h-6" />,
      title: 'Support réactif',
      description: 'Nos vendeurs ont mis en place des moyens de communication simples et efficaces pour répondre à toutes vos questions, avant ou après votre achat.'
    }
  ];

  return (
    <section className="bg-gradient-to-b from-gray-50 to-white py-12 lg:py-20 px-4 lg:px-20 relative overflow-hidden">
      {/* Decorative blur */}
      <div className="absolute top-1/2 left-1/4 w-96 h-96 bg-[rgba(210,163,11,0.03)] rounded-full blur-3xl -z-10"></div>
      
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-12">
          <div className="inline-flex items-center gap-2 bg-white border border-gray-100 rounded-full px-4 py-2 shadow-sm mb-4">
            <div className="w-2 h-2 bg-[#d2a30b] rounded-full"></div>
            <p className="text-sm text-[#0d1421]">Notre engagement</p>
          </div>
          
          <h2 className="text-[#0d1421] mb-4">
            Acheter des produits digitaux en toute simplicité
          </h2>
          
          <p className="text-[rgba(13,20,33,0.7)] max-w-2xl mx-auto mb-8">
            La qualité de vos achats sur la marketplace est assurée par nos soins. Nous avons confiance en nos vendeurs et nous sommes attentifs dans la sélection de nos produits digitaux.
          </p>
        </div>
        
        <div className="grid md:grid-cols-3 gap-6 mb-12">
          {highlights.map((highlight, index) => (
            <div key={index} className="bg-white border border-gray-100 rounded-xl p-6 hover:shadow-lg transition-all hover:border-[#d2a30b]/20">
              <div className="w-12 h-12 bg-[rgba(210,163,11,0.1)] rounded-lg flex items-center justify-center mb-4 text-[#d2a30b]">
                {highlight.icon}
              </div>
              <h3 className="text-[#0d1421] mb-3">{highlight.title}</h3>
              <p className="text-sm text-[rgba(13,20,33,0.7)] leading-relaxed">{highlight.description}</p>
            </div>
          ))}
        </div>
        
        <div className="bg-[#fffbf0] border border-[#d2a30b]/20 rounded-2xl p-8 lg:p-10">
          <div className="flex flex-col lg:flex-row gap-6 items-center">
            <div className="flex-shrink-0">
              <div className="w-16 h-16 bg-[#d2a30b] rounded-full flex items-center justify-center">
                <Shield className="w-8 h-8 text-white" />
              </div>
            </div>
            <div className="flex-1 text-center lg:text-left">
              <h3 className="font-['Merriweather',serif] text-[#0d1421] mb-2">
                Votre satisfaction est notre priorité
              </h3>
              <p className="text-[rgba(13,20,33,0.7)] mb-4">
                En cas de problème avec un produit acheté, nous disposons d&apos;une équipe support dédiée qui interviendra rapidement pour trouver une solution adaptée à votre situation.
              </p>
              <p className="text-[rgba(13,20,33,0.7)]">
                Que vous soyez développeur, designer, entrepreneur ou créateur de contenu, notre marketplace vous offre un accès simple et sécurisé aux meilleurs produits digitaux du marché.
              </p>
            </div>
            <div className="flex-shrink-0">
              <button className="bg-[#d2a30b] text-white px-6 py-3 rounded-lg hover:bg-[#b8900a] transition-colors whitespace-nowrap">
                Commencer maintenant
              </button>
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
              <li><a href="/" className="hover:text-[#d2a30b]">Accueil</a></li>
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

export default function HowItWorks({ onNavigateHome, onNavigateHowItWorks, onNavigateAllProducts, onNavigateEbooks, onNavigateApplications, onNavigateTemplates, onNavigateFAQ }: HowItWorksProps) {
  return (
    <div className="min-h-screen">
      <Header 
        onNavigateHome={onNavigateHome}
        onNavigateHowItWorks={() => {}}
        onNavigateAllProducts={onNavigateAllProducts}
        onNavigateEbooks={onNavigateEbooks}
        onNavigateApplications={onNavigateApplications}
        onNavigateTemplates={onNavigateTemplates}
        onNavigateFAQ={onNavigateFAQ}
        currentPage="how-it-works"
      />
      <HeroSection />
      <ProcessSteps />
      <SimplifiedProcess />
      <SecuritySection />
      <FAQ />
      <CTA />
      <BySection />
      <Footer />
    </div>
  );
}