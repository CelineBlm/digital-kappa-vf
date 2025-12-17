import { Shield, Lock, Eye, ChevronRight } from 'lucide-react';
import Header from './components/Header';

interface PrivacyPolicyProps {
  onNavigateHome: () => void;
  onNavigateHowItWorks: () => void;
  onNavigateAllProducts: () => void;
  onNavigateEbooks?: () => void;
  onNavigateApplications?: () => void;
  onNavigateTemplates?: () => void;
  onNavigateFAQ?: () => void;
  onNavigateAbout?: () => void;
  onNavigateCGV?: () => void;
  onNavigatePrivacy?: () => void;
}

export default function PrivacyPolicy({
  onNavigateHome,
  onNavigateHowItWorks,
  onNavigateAllProducts,
  onNavigateEbooks,
  onNavigateApplications,
  onNavigateTemplates,
  onNavigateFAQ,
  onNavigateAbout,
  onNavigateCGV,
  onNavigatePrivacy
}: PrivacyPolicyProps) {
  const highlights = [
    {
      icon: Shield,
      title: 'Protection RGPD',
      description: 'Conformité totale au règlement européen'
    },
    {
      icon: Lock,
      title: 'Données sécurisées',
      description: 'Cryptage SSL et serveurs sécurisés'
    },
    {
      icon: Eye,
      title: 'Transparence',
      description: 'Utilisation claire de vos informations'
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
        currentPage="privacy"
      />

      {/* Hero Section */}
      <section className="px-4 py-12 lg:px-20 bg-gray-50">
        <div className="max-w-4xl mx-auto text-center">
          <div className="inline-block bg-[rgba(210,163,11,0.1)] px-6 py-2 rounded-full mb-6">
            <span className="text-[#d2a30b] font-['Montserrat',sans-serif] text-sm">Vie privée</span>
          </div>
          <h1 className="text-[#1a1a1a] mb-4">
            Politique de confidentialité
          </h1>
          <p className="text-[#4a5565]">Dernière mise à jour : 1er décembre 2024</p>
        </div>
      </section>

      {/* Highlights */}
      <section className="px-4 py-12 lg:px-20">
        <div className="max-w-4xl mx-auto grid sm:grid-cols-3 gap-6">
          {highlights.map((item, index) => {
            const Icon = item.icon;
            return (
              <div
                key={index}
                className="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm text-center"
              >
                <div className="bg-[rgba(210,163,11,0.1)] w-12 h-12 rounded-lg flex items-center justify-center mb-4 mx-auto">
                  <Icon size={24} className="text-[#d2a30b]" />
                </div>
                <h3 className="font-['Merriweather',serif] text-[#1a1a1a] mb-2">
                  {item.title}
                </h3>
                <p className="text-[#4a5565] text-sm">{item.description}</p>
              </div>
            );
          })}
        </div>
      </section>

      {/* Content */}
      <section className="px-4 py-12 lg:px-20 lg:py-16">
        <div className="max-w-3xl mx-auto space-y-12">
          {/* Section 1 */}
          <div>
            <div className="flex items-center gap-3 mb-4">
              <ChevronRight size={24} className="text-[#d2a30b]" />
              <h2 className="text-[#1a1a1a]">
                1. Introduction
              </h2>
            </div>
            <div className="space-y-4 text-[#364153]">
              <p>
                Digital Kappa, exploitant de la plateforme digitalkappa.com, accorde une importance particulière à la protection de vos données personnelles et au respect de votre vie privée.
              </p>
              <p>
                La présente Politique de confidentialité a pour objectif de vous informer de manière transparente sur les données personnelles que nous collectons, les raisons de cette collecte, la manière dont nous les utilisons, les protégeons et vos droits en la matière.
              </p>
              <p>
                Cette politique s&apos;applique à tous les utilisateurs de notre site web et clients ayant effectué un achat sur Digital Kappa. En utilisant notre site, vous acceptez les termes de cette politique.
              </p>
            </div>
          </div>

          {/* Section 2 */}
          <div>
            <div className="flex items-center gap-3 mb-4">
              <ChevronRight size={24} className="text-[#d2a30b]" />
              <h2 className="text-[#1a1a1a]">
                2. Responsable du traitement
              </h2>
            </div>
            <div className="space-y-4 text-[#364153]">
              <p>
                Le responsable du traitement des données personnelles collectées sur digitalkappa.com est Digital Kappa, joignable à l&apos;adresse email : privacy@digitalkappa.com.
              </p>
              <p>
                Pour toute question relative à cette politique de confidentialité ou pour exercer vos droits, vous pouvez nous contacter à l&apos;adresse indiquée ci-dessus.
              </p>
            </div>
          </div>

          {/* Section 3 */}
          <div>
            <div className="flex items-center gap-3 mb-4">
              <ChevronRight size={24} className="text-[#d2a30b]" />
              <h2 className="text-[#1a1a1a]">
                3. Données collectées
              </h2>
            </div>
            <div className="space-y-6 text-[#364153]">
              <div>
                <h3 className="font-semibold text-[#1a1a1a] mb-3">3.1. Données fournies directement par vous</h3>
                <p className="mb-3">Lors de votre achat sur Digital Kappa, nous collectons les informations suivantes :</p>
                <ul className="space-y-2 pl-6">
                  <li className="list-disc">Nom et prénom</li>
                  <li className="list-disc">Adresse email</li>
                  <li className="list-disc">Adresse de facturation (optionnelle selon le pays)</li>
                  <li className="list-disc">Informations de paiement (traitées par notre prestataire tiers sécurisé)</li>
                </ul>
              </div>

              <div>
                <h3 className="font-semibold text-[#1a1a1a] mb-3">3.2. Données collectées automatiquement</h3>
                <p className="mb-3">Lors de votre navigation sur notre site, nous collectons automatiquement :</p>
                <ul className="space-y-2 pl-6">
                  <li className="list-disc">Adresse IP</li>
                  <li className="list-disc">Type et version de navigateur</li>
                  <li className="list-disc">Système d&apos;exploitation</li>
                  <li className="list-disc">Pages visitées et durée de visite</li>
                  <li className="list-disc">Données de navigation (via cookies analytiques)</li>
                </ul>
              </div>

              <div>
                <h3 className="font-semibold text-[#1a1a1a] mb-3">3.3. Données non collectées</h3>
                <p>
                  Nous ne collectons JAMAIS les données suivantes : numéros de carte bancaire complets (traités uniquement par notre prestataire de paiement sécurisé), données sensibles (religion, opinions politiques, santé), données biométriques, ou tout autre donnée non nécessaire à notre activité.
                </p>
              </div>
            </div>
          </div>

          {/* Section 4 */}
          <div>
            <div className="flex items-center gap-3 mb-4">
              <ChevronRight size={24} className="text-[#d2a30b]" />
              <h2 className="text-[#1a1a1a]">
                4. Finalités du traitement
              </h2>
            </div>
            <div className="space-y-4 text-[#364153]">
              <p>Vos données personnelles sont collectées et utilisées pour les finalités suivantes :</p>
              
              <div className="space-y-4 border-l-2 border-gray-200 pl-4">
                <div>
                  <h3 className="font-semibold text-[#1a1a1a] mb-1">Traitement des commandes</h3>
                  <p className="text-sm">Validation de votre achat, envoi du produit digital, génération de facture</p>
                </div>

                <div>
                  <h3 className="font-semibold text-[#1a1a1a] mb-1">Communication client</h3>
                  <p className="text-sm">Envoi des liens de téléchargement, support technique, réponses à vos questions</p>
                </div>

                <div>
                  <h3 className="font-semibold text-[#1a1a1a] mb-1">Amélioration du service</h3>
                  <p className="text-sm">Analyse statistique de navigation, optimisation de l&apos;expérience utilisateur</p>
                </div>

                <div>
                  <h3 className="font-semibold text-[#1a1a1a] mb-1">Obligations légales</h3>
                  <p className="text-sm">Conservation des factures, respect des obligations comptables et fiscales</p>
                </div>

                <div>
                  <h3 className="font-semibold text-[#1a1a1a] mb-1">Newsletter (avec consentement)</h3>
                  <p className="text-sm">Envoi d&apos;informations sur les nouveaux produits et offres spéciales (opt-in uniquement)</p>
                </div>
              </div>
            </div>
          </div>

          {/* Section 5 */}
          <div>
            <div className="flex items-center gap-3 mb-4">
              <ChevronRight size={24} className="text-[#d2a30b]" />
              <h2 className="text-[#1a1a1a]">
                5. Base légale du traitement
              </h2>
            </div>
            <div className="space-y-4 text-[#364153]">
              <p>
                Le traitement de vos données personnelles repose sur plusieurs bases légales :
              </p>
              <ul className="space-y-2 pl-6">
                <li className="list-disc">
                  <strong>Exécution du contrat :</strong> traitement des commandes et livraison des produits
                </li>
                <li className="list-disc">
                  <strong>Obligation légale :</strong> conservation des factures et données fiscales
                </li>
                <li className="list-disc">
                  <strong>Intérêt légitime :</strong> amélioration de nos services et prévention de la fraude
                </li>
                <li className="list-disc">
                  <strong>Consentement :</strong> newsletter et communications marketing (opt-in)
                </li>
              </ul>
            </div>
          </div>

          {/* Section 6 */}
          <div>
            <div className="flex items-center gap-3 mb-4">
              <ChevronRight size={24} className="text-[#d2a30b]" />
              <h2 className="text-[#1a1a1a]">
                6. Durée de conservation
              </h2>
            </div>
            <div className="space-y-4 text-[#364153]">
              <p>
                Vos données personnelles sont conservées pour les durées suivantes :
              </p>
              <ul className="space-y-2 pl-6">
                <li className="list-disc">
                  <strong>Données de commande :</strong> 10 ans (obligation légale comptable)
                </li>
                <li className="list-disc">
                  <strong>Données de navigation :</strong> 13 mois maximum
                </li>
                <li className="list-disc">
                  <strong>Newsletter :</strong> jusqu&apos;à votre désinscription
                </li>
                <li className="list-disc">
                  <strong>Support client :</strong> 3 ans après la dernière interaction
                </li>
              </ul>
            </div>
          </div>

          {/* Section 7 */}
          <div>
            <div className="flex items-center gap-3 mb-4">
              <ChevronRight size={24} className="text-[#d2a30b]" />
              <h2 className="text-[#1a1a1a]">
                7. Partage des données
              </h2>
            </div>
            <div className="space-y-4 text-[#364153]">
              <p>
                Nous ne vendons ni ne louons jamais vos données personnelles. Vos données peuvent être partagées uniquement avec :
              </p>
              <ul className="space-y-2 pl-6">
                <li className="list-disc">
                  <strong>Prestataire de paiement :</strong> pour traiter les transactions (Stripe, PayPal)
                </li>
                <li className="list-disc">
                  <strong>Hébergeur web :</strong> pour le stockage sécurisé des données
                </li>
                <li className="list-disc">
                  <strong>Service d&apos;emailing :</strong> pour l&apos;envoi des liens de téléchargement et newsletters
                </li>
                <li className="list-disc">
                  <strong>Autorités légales :</strong> en cas d&apos;obligation légale uniquement
                </li>
              </ul>
              <p>
                Tous nos prestataires sont soumis à des obligations strictes de sécurité et de confidentialité conformément au RGPD.
              </p>
            </div>
          </div>

          {/* Section 8 */}
          <div>
            <div className="flex items-center gap-3 mb-4">
              <ChevronRight size={24} className="text-[#d2a30b]" />
              <h2 className="text-[#1a1a1a]">
                8. Sécurité des données
              </h2>
            </div>
            <div className="space-y-4 text-[#364153]">
              <p>
                Nous mettons en œuvre toutes les mesures techniques et organisationnelles appropriées pour protéger vos données personnelles :
              </p>
              <ul className="space-y-2 pl-6">
                <li className="list-disc">Cryptage SSL/TLS de toutes les communications</li>
                <li className="list-disc">Serveurs sécurisés et régulièrement mis à jour</li>
                <li className="list-disc">Accès restreint aux données personnelles (principe du moindre privilège)</li>
                <li className="list-disc">Sauvegardes régulières et chiffrées</li>
                <li className="list-disc">Surveillance et détection des tentatives d&apos;intrusion</li>
              </ul>
            </div>
          </div>

          {/* Section 9 */}
          <div>
            <div className="flex items-center gap-3 mb-4">
              <ChevronRight size={24} className="text-[#d2a30b]" />
              <h2 className="text-[#1a1a1a]">
                9. Vos droits
              </h2>
            </div>
            <div className="space-y-4 text-[#364153]">
              <p>
                Conformément au RGPD, vous disposez des droits suivants concernant vos données personnelles :
              </p>
              <ul className="space-y-2 pl-6">
                <li className="list-disc">
                  <strong>Droit d&apos;accès :</strong> obtenir une copie de vos données personnelles
                </li>
                <li className="list-disc">
                  <strong>Droit de rectification :</strong> corriger vos données inexactes ou incomplètes
                </li>
                <li className="list-disc">
                  <strong>Droit à l&apos;effacement :</strong> supprimer vos données dans certaines conditions
                </li>
                <li className="list-disc">
                  <strong>Droit à la limitation :</strong> restreindre le traitement de vos données
                </li>
                <li className="list-disc">
                  <strong>Droit à la portabilité :</strong> recevoir vos données dans un format structuré
                </li>
                <li className="list-disc">
                  <strong>Droit d&apos;opposition :</strong> vous opposer au traitement de vos données
                </li>
                <li className="list-disc">
                  <strong>Droit de retrait du consentement :</strong> retirer votre consentement à tout moment
                </li>
              </ul>
              <p className="mt-4">
                Pour exercer ces droits, contactez-nous à privacy@digitalkappa.com. Nous répondrons dans un délai maximum de 30 jours.
              </p>
            </div>
          </div>

          {/* Section 10 */}
          <div>
            <div className="flex items-center gap-3 mb-4">
              <ChevronRight size={24} className="text-[#d2a30b]" />
              <h2 className="text-[#1a1a1a]">
                10. Cookies
              </h2>
            </div>
            <div className="space-y-4 text-[#364153]">
              <p>
                Notre site utilise des cookies pour améliorer votre expérience de navigation :
              </p>
              <ul className="space-y-2 pl-6">
                <li className="list-disc">
                  <strong>Cookies essentiels :</strong> nécessaires au fonctionnement du site (panier, session)
                </li>
                <li className="list-disc">
                  <strong>Cookies analytiques :</strong> mesure d&apos;audience et statistiques (Google Analytics)
                </li>
                <li className="list-disc">
                  <strong>Cookies de préférence :</strong> mémorisation de vos choix (langue, devise)
                </li>
              </ul>
              <p className="mt-4">
                Vous pouvez configurer vos préférences de cookies ou les refuser via les paramètres de votre navigateur. Notez que certaines fonctionnalités du site peuvent être limitées.
              </p>
            </div>
          </div>

          {/* Section 11 */}
          <div>
            <div className="flex items-center gap-3 mb-4">
              <ChevronRight size={24} className="text-[#d2a30b]" />
              <h2 className="text-[#1a1a1a]">
                11. Modifications
              </h2>
            </div>
            <div className="space-y-4 text-[#364153]">
              <p>
                Nous nous réservons le droit de modifier cette politique de confidentialité à tout moment. Toute modification sera publiée sur cette page avec une nouvelle date de mise à jour.
              </p>
              <p>
                En cas de modification substantielle, nous vous informerons par email ou via une notification sur le site.
              </p>
            </div>
          </div>

          {/* Section 12 */}
          <div>
            <div className="flex items-center gap-3 mb-4">
              <ChevronRight size={24} className="text-[#d2a30b]" />
              <h2 className="text-[#1a1a1a]">
                12. Contact
              </h2>
            </div>
            <div className="space-y-2 text-[#364153]">
              <p>Pour toute question concernant cette politique de confidentialité :</p>
              <p>Email : privacy@digitalkappa.com</p>
              <p>Adresse : Digital Kappa - France</p>
              <p className="mt-4">
                Vous pouvez également contacter la CNIL (Commission Nationale de l&apos;Informatique et des Libertés) si vous estimez que vos droits ne sont pas respectés.
              </p>
            </div>
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
                <li><button onClick={onNavigateAbout} className="hover:text-[#d2a30b]">À propos</button></li>
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
                <li><button onClick={onNavigateCGV} className="hover:text-[#d2a30b]">Conditions générales</button></li>
                <li><button onClick={onNavigatePrivacy} className="hover:text-[#d2a30b]">Politique de confidentialité</button></li>
                <li><button onClick={onNavigateAbout} className="hover:text-[#d2a30b]">À propos</button></li>
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