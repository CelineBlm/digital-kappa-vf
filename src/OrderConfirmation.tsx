import { CheckCircle, Download, Mail, FileText, HelpCircle, Home } from 'lucide-react';
import { useEffect, useState } from 'react';
import Header from './components/Header';
import Footer from './components/Footer';

interface OrderItem {
  id: string;
  name: string;
  price: string;
  downloadUrl: string;
}

interface OrderData {
  orderNumber: string;
  email: string;
  date: string;
  total: string;
  items: OrderItem[];
}

interface OrderConfirmationProps {
  orderData: OrderData | null;
  onNavigateHome: () => void;
  onNavigateAllProducts?: () => void;
  onNavigateHowItWorks?: () => void;
  onNavigateEbooks?: () => void;
  onNavigateApplications?: () => void;
  onNavigateTemplates?: () => void;
  onNavigateFAQ?: () => void;
  onNavigateAbout?: () => void;
  onNavigateCGV?: () => void;
  onNavigatePrivacy?: () => void;
}

export default function OrderConfirmation({ 
  orderData, 
  onNavigateHome, 
  onNavigateAllProducts,
  onNavigateHowItWorks,
  onNavigateEbooks,
  onNavigateApplications,
  onNavigateTemplates,
  onNavigateFAQ,
  onNavigateAbout,
  onNavigateCGV,
  onNavigatePrivacy
}: OrderConfirmationProps) {
  const [data, setData] = useState<OrderData | null>(null);

  useEffect(() => {
    // Utiliser les données passées en props ou des données par défaut
    const defaultData = {
      orderNumber: 'DK-' + Date.now(),
      email: 'client@example.com',
      date: new Date().toLocaleDateString('fr-FR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
      }),
      total: '149 €',
      items: [
        {
          id: 'design-system-pro',
          name: 'Design System Pro',
          price: '149 €',
          downloadUrl: '#'
        }
      ]
    };
    
    setData(orderData || defaultData);
  }, [orderData]);

  if (!data) {
    return null;
  }

  return (
    <div className="min-h-screen bg-gray-50">
      {/* Header */}
      <Header
        onNavigateHome={onNavigateHome}
        onNavigateHowItWorks={onNavigateHowItWorks}
        onNavigateAllProducts={onNavigateAllProducts}
        onNavigateEbooks={onNavigateEbooks}
        onNavigateApplications={onNavigateApplications}
        onNavigateTemplates={onNavigateTemplates}
        onNavigateFAQ={onNavigateFAQ}
      />

      {/* Header de confirmation */}
      <div className="bg-white border-b border-gray-100">
        <div className="mx-auto max-w-4xl px-4 py-12 lg:px-8">
          <div className="text-center">
            {/* Icône de succès */}
            <div className="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-green-100">
              <CheckCircle className="h-12 w-12 text-green-600" />
            </div>
            
            {/* Titre */}
            <h1 className="mb-2 text-[#0d1421]">
              Commande confirmée !
            </h1>
            
            {/* Message */}
            <p className="text-lg text-[rgba(13,20,33,0.7)]">
              Merci pour votre achat. Votre commande a été traitée avec succès.
            </p>
            
            {/* Numéro de commande */}
            <div className="mt-6 inline-flex items-center gap-2 rounded-lg bg-[rgba(210,163,11,0.1)] px-4 py-2">
              <FileText className="h-5 w-5 text-[#d2a30b]" />
              <span className="text-sm font-semibold text-[#d2a30b]">
                Commande n° {data.orderNumber}
              </span>
            </div>
          </div>
        </div>
      </div>

      {/* Contenu principal */}
      <div className="mx-auto max-w-4xl px-4 py-12 lg:px-8">
        <div className="grid gap-8 lg:grid-cols-3">
          
          {/* Colonne principale - 2/3 */}
          <div className="lg:col-span-2 space-y-8">
            
            {/* Email de confirmation */}
            <div className="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
              <div className="flex items-start gap-4">
                <div className="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50">
                  <Mail className="h-6 w-6 text-blue-600" />
                </div>
                <div className="flex-1">
                  <h3 className="mb-1 text-[#1a1a1a]">
                    Email de confirmation envoyé
                  </h3>
                  <p className="text-sm text-gray-600">
                    Un email de confirmation a été envoyé à <strong className="text-[#1a1a1a]">{data.email}</strong> avec le récapitulatif de votre commande et les liens de téléchargement.
                  </p>
                </div>
              </div>
            </div>

            {/* Produits commandés */}
            <div className="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
              <h2 className="mb-6 text-[#1a1a1a]">
                Vos produits
              </h2>
              
              <div className="space-y-4">
                {data.items.map((item) => (
                  <div
                    key={item.id}
                    className="flex items-start gap-4 rounded-xl border border-gray-100 bg-gray-50 p-4"
                  >
                    <div className="flex-1">
                      <h3 className="mb-1 text-[#1a1a1a]">
                        {item.name}
                      </h3>
                      <p className="text-sm text-gray-600">
                        Prix : {item.price}
                      </p>
                    </div>
                    
                    {/* Bouton de téléchargement */}
                    <a
                      href={item.downloadUrl}
                      className="inline-flex items-center gap-2 rounded-lg bg-[#d2a30b] px-4 py-2.5 text-sm font-semibold text-white transition-all hover:bg-[#b8900a]"
                    >
                      <Download className="h-4 w-4" />
                      Télécharger
                    </a>
                  </div>
                ))}
              </div>

              {/* Info téléchargement */}
              <div className="mt-6 rounded-lg bg-blue-50 p-4">
                <div className="flex gap-3">
                  <Download className="h-5 w-5 flex-shrink-0 text-blue-600" />
                  <div className="text-sm text-blue-900">
                    <p className="font-semibold mb-1">Accès à vie à vos téléchargements</p>
                    <p className="text-blue-800">
                      Vous pouvez télécharger vos produits autant de fois que vous le souhaitez. Les liens ne expirent jamais et vous recevrez toutes les futures mises à jour gratuitement.
                    </p>
                  </div>
                </div>
              </div>
            </div>

            {/* Prochaines étapes */}
            <div className="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
              <h2 className="mb-6 text-[#1a1a1a]">
                Prochaines étapes
              </h2>
              
              <div className="space-y-4">
                {/* Étape 1 */}
                <div className="flex gap-4">
                  <div className="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-[#d2a30b] text-sm font-bold text-white">
                    1
                  </div>
                  <div>
                    <h3 className="mb-1 text-[#1a1a1a]">
                      Consultez votre email
                    </h3>
                    <p className="text-sm text-gray-600">
                      Un email de confirmation avec tous les détails et liens de téléchargement vous a été envoyé.
                    </p>
                  </div>
                </div>

                {/* Étape 2 */}
                <div className="flex gap-4">
                  <div className="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-[#d2a30b] text-sm font-bold text-white">
                    2
                  </div>
                  <div>
                    <h3 className="mb-1 text-[#1a1a1a]">
                      Téléchargez vos produits
                    </h3>
                    <p className="text-sm text-gray-600">
                      Cliquez sur les boutons de téléchargement ci-dessus ou utilisez les liens dans votre email.
                    </p>
                  </div>
                </div>

                {/* Étape 3 */}
                <div className="flex gap-4">
                  <div className="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-[#d2a30b] text-sm font-bold text-white">
                    3
                  </div>
                  <div>
                    <h3 className="mb-1 text-[#1a1a1a]">
                      Commencez à utiliser
                    </h3>
                    <p className="text-sm text-gray-600">
                      Suivez la documentation incluse pour démarrer rapidement avec vos nouveaux produits.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {/* Sidebar - 1/3 */}
          <div className="space-y-6">
            
            {/* Récapitulatif commande */}
            <div className="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
              <h3 className="mb-4 text-[#1a1a1a]">
                Récapitulatif
              </h3>
              
              <div className="space-y-3 border-b border-gray-100 pb-4 mb-4">
                <div className="flex justify-between text-sm">
                  <span className="text-gray-600">Commande n°</span>
                  <span className="font-semibold text-[#1a1a1a]">{data.orderNumber}</span>
                </div>
                <div className="flex justify-between text-sm">
                  <span className="text-gray-600">Date</span>
                  <span className="font-semibold text-[#1a1a1a]">{data.date}</span>
                </div>
                <div className="flex justify-between text-sm">
                  <span className="text-gray-600">Email</span>
                  <span className="font-semibold text-[#1a1a1a] truncate max-w-[150px]" title={data.email}>
                    {data.email}
                  </span>
                </div>
              </div>
              
              <div className="flex justify-between">
                <span className="font-semibold text-[#1a1a1a]">Total</span>
                <span className="text-2xl font-bold text-[#d2a30b]">{data.total}</span>
              </div>
            </div>

            {/* Support */}
            <div className="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
              <div className="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-purple-50">
                <HelpCircle className="h-6 w-6 text-purple-600" />
              </div>
              
              <h3 className="mb-2 text-[#1a1a1a]">
                Besoin d'aide ?
              </h3>
              <p className="mb-4 text-sm text-gray-600">
                Notre équipe support est là pour vous aider.
              </p>
              
              <a
                href="mailto:support@digitalkappa.com"
                className="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition-all hover:bg-gray-50"
              >
                <Mail className="h-4 w-4" />
                Contacter le support
              </a>
            </div>

            {/* Garanties */}
            <div className="rounded-2xl border border-gray-100 bg-[#f9fafb] p-6">
              <h3 className="mb-4 text-sm font-semibold text-[#1a1a1a]">
                Vos garanties
              </h3>
              
              <div className="space-y-3 text-sm text-gray-600">
                <div className="flex items-start gap-2">
                  <CheckCircle className="h-4 w-4 flex-shrink-0 text-green-600 mt-0.5" />
                  <span>Téléchargements illimités</span>
                </div>
                <div className="flex items-start gap-2">
                  <CheckCircle className="h-4 w-4 flex-shrink-0 text-green-600 mt-0.5" />
                  <span>Mises à jour gratuites</span>
                </div>
                <div className="flex items-start gap-2">
                  <CheckCircle className="h-4 w-4 flex-shrink-0 text-green-600 mt-0.5" />
                  <span>Support technique inclus</span>
                </div>
                <div className="flex items-start gap-2">
                  <CheckCircle className="h-4 w-4 flex-shrink-0 text-green-600 mt-0.5" />
                  <span>Satisfait ou remboursé 14 jours</span>
                </div>
              </div>
            </div>

            {/* Bouton retour */}
            <button
              onClick={onNavigateHome}
              className="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-[#d2a30b] px-6 py-3 font-semibold text-white transition-all hover:bg-[#b8900a]"
            >
              <Home className="h-5 w-5" />
              Retour à l'accueil
            </button>
          </div>
        </div>
      </div>

      {/* Section CTA */}
      <div className="bg-[#2b2d31] py-16">
        <div className="mx-auto max-w-4xl px-4 text-center lg:px-8">
          <h2 className="mb-4 text-white">
            Découvrez nos autres produits
          </h2>
          <p className="mb-8 text-lg text-gray-300">
            Explorez notre catalogue complet de produits digitaux premium
          </p>
          <button
            onClick={onNavigateAllProducts}
            className="inline-flex items-center gap-2 rounded-lg border-2 border-[#d2a30b] bg-transparent px-8 py-3 font-semibold text-[#d2a30b] transition-all hover:bg-[#d2a30b] hover:text-white"
          >
            Voir tous les produits
          </button>
        </div>
      </div>

      {/* Footer */}
      <Footer
        onNavigateAbout={onNavigateAbout}
        onNavigateCGV={onNavigateCGV}
        onNavigatePrivacy={onNavigatePrivacy}
      />
    </div>
  );
}