import { useState } from 'react';
import { ChevronLeft, ShieldCheck, Check } from 'lucide-react';
import Header from './components/Header';
import { Product } from './data/products';
import Icon from './imports/Icon-11-8611';

interface CheckoutProps {
  product: Product;
  onNavigateHome: () => void;
  onNavigateHowItWorks: () => void;
  onNavigateAllProducts?: () => void;
  onNavigateEbooks?: () => void;
  onNavigateApplications?: () => void;
  onNavigateTemplates?: () => void;
  onNavigateFAQ?: () => void;
  onNavigateBack: () => void;
  onNavigateCGV?: () => void;
  onOrderComplete?: (orderData: any) => void;
}

export default function Checkout({
  product,
  onNavigateHome,
  onNavigateHowItWorks,
  onNavigateAllProducts,
  onNavigateEbooks,
  onNavigateApplications,
  onNavigateTemplates,
  onNavigateFAQ,
  onNavigateBack,
  onNavigateCGV,
  onOrderComplete
}: CheckoutProps) {
  const [email, setEmail] = useState('');
  const [firstName, setFirstName] = useState('');
  const [lastName, setLastName] = useState('');

  // Calculate prices
  const priceValue = parseInt(product.price.replace(/[^0-9]/g, ''));
  const tva = Math.round(priceValue * 0.2 * 100) / 100;
  const total = priceValue;

  const handlePayment = () => {
    // Payment logic here
    console.log('Processing payment for:', { email, firstName, lastName, product });
    
    // Simulate successful payment and redirect to confirmation
    const orderData = {
      orderNumber: 'DK-' + Date.now(),
      email,
      date: new Date().toLocaleDateString('fr-FR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
      }),
      total: total + ' €',
      items: [
        {
          id: product.id,
          name: product.title,
          price: product.price,
          downloadUrl: '#download-' + product.id
        }
      ]
    };
    
    if (onOrderComplete) {
      onOrderComplete(orderData);
    }
  };

  const benefits = [
    'Accès instantané au produit',
    'Téléchargement immédiat',
    'Garantie 14 jours satisfait ou remboursé',
    'Support technique inclus'
  ];

  return (
    <div className="min-h-screen bg-white">
      <Header 
        onNavigateHome={onNavigateHome}
        onNavigateHowItWorks={onNavigateHowItWorks}
        onNavigateAllProducts={onNavigateAllProducts || (() => {})}
        onNavigateEbooks={onNavigateEbooks}
        onNavigateApplications={onNavigateApplications}
        onNavigateTemplates={onNavigateTemplates}
        onNavigateFAQ={onNavigateFAQ}
        currentPage="checkout"
      />

      {/* Main Content */}
      <div className="py-6 lg:py-12 px-4 lg:px-20">
        <div className="max-w-7xl mx-auto">
          {/* Back button */}
          <button 
            onClick={onNavigateBack}
            className="flex items-center gap-2 text-[#4a5565] hover:text-[#d2a30b] mb-6 transition-colors"
          >
            <ChevronLeft size={20} />
            <span className="text-sm font-['Montserrat',sans-serif]">Retour au produit</span>
          </button>

          <div className="grid lg:grid-cols-2 gap-8 lg:gap-12">
            {/* Left Column - Form */}
            <div className="bg-white lg:border lg:border-gray-100 lg:rounded-2xl lg:p-8 lg:shadow-sm">
              <h1 className="font-['Merriweather',serif] text-[#1a1a1a] text-2xl lg:text-3xl mb-8">
                Finaliser votre achat
              </h1>

              {/* Contact Information */}
              <div className="mb-8">
                <h2 className="text-[#1a1a1a] mb-4">
                  Informations de contact
                </h2>
                
                <div className="space-y-4">
                  {/* Email */}
                  <div>
                    <label className="block text-sm text-[#364153] font-['Montserrat',sans-serif] mb-2">
                      Adresse email *
                    </label>
                    <input
                      type="email"
                      value={email}
                      onChange={(e) => setEmail(e.target.value)}
                      placeholder="votre@email.com"
                      className="w-full px-4 py-3 border border-[#d1d5dc] rounded-lg text-[#1a1a1a] placeholder:text-[rgba(10,10,10,0.5)] font-['Montserrat',sans-serif] focus:outline-none focus:border-[#d2a30b] focus:ring-2 focus:ring-[#d2a30b]/20"
                    />
                    <p className="text-xs text-[#6a7282] font-['Montserrat',sans-serif] mt-2">
                      Le lien de téléchargement sera envoyé à cette adresse
                    </p>
                  </div>

                  {/* Name fields */}
                  <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                      <label className="block text-sm text-[#364153] font-['Montserrat',sans-serif] mb-2">
                        Prénom
                      </label>
                      <input
                        type="text"
                        value={firstName}
                        onChange={(e) => setFirstName(e.target.value)}
                        placeholder="Jean"
                        className="w-full px-4 py-3 border border-[#d1d5dc] rounded-lg text-[#1a1a1a] placeholder:text-[rgba(10,10,10,0.5)] font-['Montserrat',sans-serif] focus:outline-none focus:border-[#d2a30b] focus:ring-2 focus:ring-[#d2a30b]/20"
                      />
                    </div>
                    <div>
                      <label className="block text-sm text-[#364153] font-['Montserrat',sans-serif] mb-2">
                        Nom
                      </label>
                      <input
                        type="text"
                        value={lastName}
                        onChange={(e) => setLastName(e.target.value)}
                        placeholder="Dupont"
                        className="w-full px-4 py-3 border border-[#d1d5dc] rounded-lg text-[#1a1a1a] placeholder:text-[rgba(10,10,10,0.5)] font-['Montserrat',sans-serif] focus:outline-none focus:border-[#d2a30b] focus:ring-2 focus:ring-[#d2a30b]/20"
                      />
                    </div>
                  </div>
                </div>
              </div>

              {/* Payment Section */}
              <div className="pt-6 border-t border-gray-200">
                <h2 className="text-[#1a1a1a] mb-4">
                  Paiement
                </h2>
                <div className="bg-gray-50 border border-[#d1d5dc] rounded-lg p-4 text-center">
                  <p className="text-sm text-[#4a5565] font-['Montserrat',sans-serif]">
                    Le module de paiement Stripe sera intégré ici
                  </p>
                </div>
              </div>

              {/* Pay Button */}
              <button
                onClick={handlePayment}
                className="w-full bg-[#d2a30b] text-white py-4 rounded-lg hover:bg-[#b8900a] transition-colors mt-6 font-['Montserrat',sans-serif] font-semibold text-lg"
              >
                Payer {product.price}
              </button>

              {/* Terms */}
              <p className="text-xs text-[#6a7282] text-center mt-4 font-['Montserrat',sans-serif]">
                En cliquant sur "Payer", vous acceptez nos{' '}
                <button 
                  onClick={onNavigateCGV}
                  className="text-[#d2a30b] hover:underline"
                >
                  conditions générales de vente
                </button>
              </p>

              {/* Security notice */}
              <div className="flex items-center justify-center gap-3 pt-6 border-t border-gray-200 mt-6">
                <ShieldCheck className="w-5 h-5 text-[#99a1af]" />
                <p className="text-sm text-[#6a7282] font-['Montserrat',sans-serif]">
                  Paiement 100% sécurisé par Stripe
                </p>
              </div>
            </div>

            {/* Right Column - Order Summary */}
            <div className="lg:sticky lg:top-24 lg:self-start">
              <div className="bg-gray-50 lg:bg-white lg:border lg:border-gray-100 rounded-2xl p-6 lg:p-8 lg:shadow-sm">
                <h2 className="text-[#1a1a1a] mb-6">
                  Récapitulatif de commande
                </h2>

                {/* Product */}
                <div className="flex gap-4 pb-6 border-b border-gray-200">
                  <img 
                    src={product.image}
                    alt={product.title}
                    className="w-20 h-20 rounded-lg object-cover"
                  />
                  <div className="flex-1">
                    <p className="text-xs text-[#d2a30b] font-['Montserrat',sans-serif] mb-1">
                      {product.category}
                    </p>
                    <h3 className="text-[#1a1a1a] font-['Montserrat',sans-serif] mb-2">
                      {product.title}
                    </h3>
                    <p className="font-['Montserrat',sans-serif] text-[#1a1a1a]">
                      {product.price}
                    </p>
                  </div>
                </div>

                {/* Price breakdown */}
                <div className="py-6 border-b border-gray-200 space-y-3">
                  <div className="flex justify-between text-sm font-['Montserrat',sans-serif]">
                    <span className="text-[#4a5565]">Sous-total</span>
                    <span className="text-[#1a1a1a]">{product.price}</span>
                  </div>
                  <div className="flex justify-between text-sm font-['Montserrat',sans-serif]">
                    <span className="text-[#4a5565]">TVA (20%)</span>
                    <span className="text-[#1a1a1a]">{tva.toFixed(2)} €</span>
                  </div>
                </div>

                {/* Total */}
                <div className="flex justify-between py-6 border-b border-gray-200">
                  <span className="font-['Merriweather',serif] text-[#1a1a1a] text-lg">
                    Total
                  </span>
                  <span className="font-['Montserrat',sans-serif] font-semibold text-2xl text-[#1a1a1a]">
                    {total} €
                  </span>
                </div>

                {/* Benefits */}
                <div className="pt-6">
                  <p className="text-sm text-[#4a5565] font-['Montserrat',sans-serif] mb-4">
                    Ce que vous obtenez :
                  </p>
                  <ul className="space-y-3">
                    {benefits.map((benefit, index) => (
                      <li key={index} className="flex items-start gap-2">
                        <Check className="w-5 h-5 text-[#d2a30b] shrink-0 mt-0.5" />
                        <span className="text-sm text-[#4a5565] font-['Montserrat',sans-serif]">
                          {benefit}
                        </span>
                      </li>
                    ))}
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* Footer */}
      <footer className="bg-[#1a1a1a] text-gray-400 py-12 px-4 lg:px-20 mt-12">
        <div className="max-w-7xl mx-auto">
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            <div>
              <div className="mb-4">
                <div className="flex items-center gap-2">
                  <div className="w-10 h-10 rounded flex items-center justify-center">
                    <Icon />
                  </div>
                </div>
              </div>
              <p className="text-sm text-[#99a1af] leading-6 font-['Montserrat',sans-serif]">
                Des ressources numériques simples et de qualité pour créateurs, entrepreneurs et passionnés.
              </p>
            </div>
            
            <div>
              <h4 className="text-white mb-4 font-['Merriweather',serif]">Légal</h4>
              <ul className="space-y-3 text-sm">
                <li><button className="text-[#99a1af] hover:text-[#d2a30b] transition-colors font-['Montserrat',sans-serif]">À propos</button></li>
                <li><button onClick={onNavigateCGV} className="text-[#99a1af] hover:text-[#d2a30b] transition-colors font-['Montserrat',sans-serif]">CGV</button></li>
                <li><button className="text-[#99a1af] hover:text-[#d2a30b] transition-colors font-['Montserrat',sans-serif]">Confidentialité</button></li>
              </ul>
            </div>
            
            <div>
              <h4 className="text-white mb-4 font-['Merriweather',serif]">Catégories</h4>
              <ul className="space-y-3 text-sm">
                <li><button onClick={onNavigateEbooks} className="text-[#99a1af] hover:text-[#d2a30b] transition-colors font-['Montserrat',sans-serif]">Ebooks</button></li>
                <li><button onClick={onNavigateApplications} className="text-[#99a1af] hover:text-[#d2a30b] transition-colors font-['Montserrat',sans-serif]">Applications</button></li>
                <li><button onClick={onNavigateTemplates} className="text-[#99a1af] hover:text-[#d2a30b] transition-colors font-['Montserrat',sans-serif]">Templates</button></li>
              </ul>
            </div>
          </div>
          
          <div className="border-t border-gray-700 pt-8 text-center text-sm">
            <p className="font-['Montserrat',sans-serif]">&copy; 2024 Digital Kappa. Tous droits réservés.</p>
          </div>
        </div>
      </footer>
    </div>
  );
}