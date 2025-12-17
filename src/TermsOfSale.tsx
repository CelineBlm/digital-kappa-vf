import { FileText, CreditCard, Shield, RefreshCw } from 'lucide-react';
import Header from './components/Header';

interface TermsOfSaleProps {
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

export default function TermsOfSale({
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
}: TermsOfSaleProps) {
  const highlights = [
    {
      icon: FileText,
      title: 'Produits digitaux',
      description: 'Tous nos produits sont 100% numériques et téléchargeables instantanément'
    },
    {
      icon: CreditCard,
      title: 'Paiement sécurisé',
      description: 'Transactions cryptées et conformes aux normes bancaires'
    },
    {
      icon: Shield,
      title: "Licence d'utilisation",
      description: 'Chaque achat inclut une licence personnelle ou commerciale'
    },
    {
      icon: RefreshCw,
      title: 'Garantie 14 jours',
      description: 'Remboursement intégral si le produit ne correspond pas'
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
        currentPage="cgv"
      />

      {/* Hero Section */}
      <section className="px-4 py-12 lg:px-20 bg-gray-50">
        <div className="max-w-4xl mx-auto text-center">
          <div className="inline-block bg-[rgba(210,163,11,0.1)] px-6 py-2 rounded-full mb-6">
            <span className="text-[#d2a30b] font-['Montserrat',sans-serif] text-sm">Mentions légales</span>
          </div>
          <h1 className="text-[#1a1a1a] mb-4">
            Conditions générales de vente
          </h1>
          <p className="text-[#4a5565]">Dernière mise à jour : 1er décembre 2024</p>
        </div>
      </section>

      {/* Highlights */}
      <section className="px-4 py-12 lg:px-20">
        <div className="max-w-4xl mx-auto grid sm:grid-cols-2 gap-6">
          {highlights.map((item, index) => {
            const Icon = item.icon;
            return (
              <div
                key={index}
                className="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm"
              >
                <div className="bg-[rgba(210,163,11,0.1)] w-12 h-12 rounded-lg flex items-center justify-center mb-4">
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
            <h2 className="text-[#1a1a1a] mb-4">
              1. Objet et champ d&apos;application
            </h2>
            <div className="space-y-4 text-[#364153]">
              <p>
                Les présentes Conditions Générales de Vente (CGV) régissent les relations contractuelles entre Digital Kappa, société exploitant la plateforme digitalkappa.com, et tout client souhaitant effectuer un achat de produits digitaux sur le site.
              </p>
              <p>
                En effectuant une commande sur Digital Kappa, le client reconnaît avoir pris connaissance des présentes CGV et les accepter sans réserve. Ces conditions prévalent sur tout autre document, sauf accord écrit préalable.
              </p>
            </div>
          </div>

          {/* Section 2 */}
          <div>
            <h2 className="text-[#1a1a1a] mb-4">
              2. Produits et services
            </h2>
            <div className="space-y-4 text-[#364153]">
              <p>
                Digital Kappa commercialise exclusivement des produits digitaux sous forme de fichiers téléchargeables : ebooks (format PDF), applications mobiles et web (fichiers d&apos;installation ou code source), et templates de design (fichiers compatibles avec divers logiciels).
              </p>
              <p>
                Chaque produit fait l&apos;objet d&apos;une description détaillée sur sa page dédiée, incluant le contenu, les prérequis techniques, la licence d&apos;utilisation, les formats disponibles et les mises à jour incluses. Il appartient au client de s&apos;assurer de la compatibilité du produit avec son matériel et ses besoins.
              </p>
              <p>
                Digital Kappa s&apos;efforce de présenter les produits avec la plus grande exactitude possible. Cependant, en cas d&apos;erreur manifeste entre la description et le produit livré, le client dispose d&apos;un droit de rétractation conformément à l&apos;article 6.
              </p>
            </div>
          </div>

          {/* Section 3 */}
          <div>
            <h2 className="text-[#1a1a1a] mb-4">
              3. Commande et tarifs
            </h2>
            <div className="space-y-4 text-[#364153]">
              <p>
                Tous les prix affichés sur Digital Kappa sont en euros (€) et incluent la TVA applicable au taux en vigueur. Les prix sont fermes et non révisables pendant leur période de validité, telle qu&apos;indiquée sur le site.
              </p>
              <p>
                Pour passer commande, le client doit cliquer sur le bouton &quot;Acheter maintenant&quot; de la page produit, renseigner ses coordonnées (nom, prénom, email) et procéder au paiement. Aucune création de compte n&apos;est nécessaire. La validation de la commande vaut acceptation des prix et des CGV.
              </p>
              <p>
                Digital Kappa se réserve le droit de refuser toute commande d&apos;un client avec lequel il existerait un litige relatif au paiement d&apos;une commande antérieure, ou en cas de comportement frauduleux avéré.
              </p>
            </div>
          </div>

          {/* Section 4 */}
          <div>
            <h2 className="text-[#1a1a1a] mb-4">
              4. Paiement
            </h2>
            <div className="space-y-4 text-[#364153]">
              <p>
                Le paiement s&apos;effectue en ligne au moment de la commande par carte bancaire (Visa, Mastercard, American Express) ou via PayPal. Les informations de paiement sont transmises directement à notre prestataire de paiement sécurisé et ne transitent jamais par nos serveurs.
              </p>
              <p>
                Toutes les transactions sont cryptées selon le protocole SSL et conformes aux normes PCI-DSS. Le débit de la carte bancaire intervient immédiatement lors de la validation de la commande.
              </p>
              <p>
                En cas de refus d&apos;autorisation de paiement par la banque du client, la commande est automatiquement annulée et le client en est informé par email. Digital Kappa ne saurait être tenu responsable des refus d&apos;autorisation émanant des organismes bancaires.
              </p>
            </div>
          </div>

          {/* Section 5 */}
          <div>
            <h2 className="text-[#1a1a1a] mb-4">
              5. Livraison et accès aux produits
            </h2>
            <div className="space-y-4 text-[#364153]">
              <p>
                La livraison des produits digitaux s&apos;effectue immédiatement après confirmation du paiement. Le client reçoit par email un lien de téléchargement sécurisé valable 30 jours, permettant de télécharger le produit acheté ainsi que sa facture.
              </p>
              <p>
                Il est de la responsabilité du client de vérifier que l&apos;adresse email renseignée lors de la commande est correcte et valide. Digital Kappa ne saurait être tenu responsable d&apos;une non-réception due à une erreur de saisie ou à un filtre anti-spam.
              </p>
              <p>
                En cas de problème technique lors du téléchargement, le client peut contacter le support à l&apos;adresse support@digitalkappa.com. Un nouveau lien sera généré dans les plus brefs délais.
              </p>
            </div>
          </div>

          {/* Section 6 */}
          <div>
            <h2 className="text-[#1a1a1a] mb-4">
              6. Droit de rétractation et remboursement
            </h2>
            <div className="space-y-4 text-[#364153]">
              <p>
                Conformément à l&apos;article L221-28 du Code de la consommation, le droit de rétractation ne peut être exercé pour les contrats de fourniture d&apos;un contenu numérique non fourni sur un support matériel dont l&apos;exécution a commencé avec l&apos;accord préalable exprès du consommateur.
              </p>
              <p>
                Néanmoins, Digital Kappa offre une garantie satisfait ou remboursé de 14 jours. Si le produit ne correspond pas à vos attentes ou présente un défaut non mentionné dans la description, vous pouvez demander un remboursement intégral dans les 14 jours suivant l&apos;achat.
              </p>
              <p>
                Pour exercer ce droit, le client doit envoyer une demande motivée à support@digitalkappa.com en indiquant son numéro de commande et les raisons de son insatisfaction. Le remboursement sera effectué dans un délai de 7 jours ouvrés sur le moyen de paiement utilisé lors de l&apos;achat.
              </p>
            </div>
          </div>

          {/* Section 7 */}
          <div>
            <h2 className="text-[#1a1a1a] mb-4">
              7. Licence d&apos;utilisation
            </h2>
            <div className="space-y-4 text-[#364153]">
              <p>
                Chaque achat sur Digital Kappa confère au client une licence d&apos;utilisation non exclusive et non transférable du produit digital. Cette licence peut être de type &quot;Personnel&quot; (usage personnel uniquement) ou &quot;Commercial&quot; (autorisation d&apos;utiliser le produit dans des projets commerciaux), selon le produit acheté.
              </p>
              <p>
                Le client est autorisé à utiliser le produit pour ses propres besoins, à le modifier selon ses besoins (pour les templates et applications incluant le code source), mais ne peut en aucun cas le revendre, le redistribuer ou le partager avec des tiers.
              </p>
              <p>
                Digital Kappa conserve l&apos;intégralité des droits de propriété intellectuelle sur les produits vendus. Toute utilisation non conforme à la licence accordée expose le client à des poursuites judiciaires.
              </p>
            </div>
          </div>

          {/* Section 8 */}
          <div>
            <h2 className="text-[#1a1a1a] mb-4">
              8. Garantie et support
            </h2>
            <div className="space-y-4 text-[#364153]">
              <p>
                Digital Kappa garantit que les produits vendus sont conformes à leur description et exempts de défauts majeurs au moment de l&apos;achat. Chaque produit a été testé en conditions réelles avant sa mise en vente.
              </p>
              <p>
                Un support technique par email est disponible pour tous les clients ayant effectué un achat. Le délai de réponse moyen est de 48 heures ouvrées. Le support couvre les questions d&apos;installation, de compatibilité et de fonctionnement du produit.
              </p>
              <p>
                Les mises à jour mineures (corrections de bugs, améliorations) sont incluses gratuitement et envoyées automatiquement par email aux clients concernés. Les mises à jour majeures (nouvelles versions) peuvent faire l&apos;objet d&apos;un supplément tarifaire.
              </p>
            </div>
          </div>

          {/* Section 9 */}
          <div>
            <h2 className="text-[#1a1a1a] mb-4">
              9. Données personnelles
            </h2>
            <div className="space-y-4 text-[#364153]">
              <p>
                Les données personnelles collectées lors de la commande (nom, prénom, email, adresse) sont utilisées exclusivement pour le traitement de la commande, l&apos;envoi du produit et la communication avec le client.
              </p>
              <p>
                Conformément au RGPD, le client dispose d&apos;un droit d&apos;accès, de rectification et de suppression de ses données personnelles. Pour exercer ces droits, il peut contacter Digital Kappa à l&apos;adresse privacy@digitalkappa.com.
              </p>
            </div>
          </div>

          {/* Section 10 */}
          <div>
            <h2 className="text-[#1a1a1a] mb-4">
              10. Responsabilité
            </h2>
            <div className="space-y-4 text-[#364153]">
              <p>
                Digital Kappa ne saurait être tenu responsable des dommages indirects résultant de l&apos;utilisation ou de l&apos;impossibilité d&apos;utiliser les produits vendus. La responsabilité de Digital Kappa est limitée au montant payé par le client pour le produit concerné.
              </p>
              <p>
                Les produits vendus sont fournis &quot;en l&apos;état&quot;. Le client reconnaît avoir vérifié l&apos;adéquation du produit à ses besoins avant l&apos;achat.
              </p>
            </div>
          </div>

          {/* Section 11 */}
          <div>
            <h2 className="text-[#1a1a1a] mb-4">
              11. Litiges et médiation
            </h2>
            <div className="space-y-4 text-[#364153]">
              <p>
                En cas de litige, le client peut dans un premier temps contacter le service client de Digital Kappa à l&apos;adresse support@digitalkappa.com pour tenter de trouver une solution amiable.
              </p>
              <p>
                Si aucun accord amiable n&apos;est trouvé, le client peut recourir à la médiation de la consommation. Les présentes CGV sont soumises au droit français.
              </p>
            </div>
          </div>

          {/* Section 12 */}
          <div>
            <h2 className="text-[#1a1a1a] mb-4">
              12. Contact
            </h2>
            <div className="space-y-2 text-[#364153]">
              <p>Pour toute question concernant ces conditions générales :</p>
              <p>Email : support@digitalkappa.com</p>
              <p>Adresse : Digital Kappa - France</p>
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