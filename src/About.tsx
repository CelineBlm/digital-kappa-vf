import { Shield, Users, Award, Zap, Check, TrendingUp } from 'lucide-react';
import Header from './components/Header';

interface AboutProps {
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

export default function About({
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
}: AboutProps) {
  const stats = [
    { value: '2026', label: 'Année de lancement' },
    { value: '100%', label: 'Engagement qualité' },
    { value: '14 jours', label: 'Garantie satisfait ou remboursé' },
    { value: '24h', label: 'Support réactif' }
  ];

  const values = [
    {
      icon: Zap,
      title: 'Simplicité',
      description: 'Des produits faciles à comprendre et à utiliser, sans complexité inutile.'
    },
    {
      icon: Users,
      title: 'Accessibilité',
      description: 'Des ressources accessibles à tous, quel que soit votre niveau.'
    },
    {
      icon: Award,
      title: 'Qualité',
      description: "Une sélection rigoureuse garantissant l'excellence de chaque produit."
    },
    {
      icon: TrendingUp,
      title: 'Modernité',
      description: 'Des outils et designs à la pointe des tendances actuelles.'
    },
    {
      icon: Shield,
      title: 'Fiabilité',
      description: 'Des produits testés et approuvés par notre communauté.'
    },
    {
      icon: Check,
      title: 'Satisfaction client',
      description: 'Votre réussite est notre priorité absolue.'
    }
  ];

  const differentiators = [
    {
      title: 'Téléchargement instantané',
      description: "Accédez immédiatement à vos produits dès l'achat, sans attente."
    },
    {
      title: 'Organisation claire et intuitive',
      description: 'Trouvez facilement ce que vous cherchez grâce à notre système de catégorisation simple.'
    },
    {
      title: 'Qualité constante',
      description: 'Chaque produit est vérifié et validé selon nos standards élevés.'
    },
    {
      title: 'Support dédié',
      description: 'Une équipe disponible pour vous accompagner dans vos projets.'
    },
    {
      title: 'Mises à jour gratuites',
      description: 'Bénéficiez des améliorations et nouvelles fonctionnalités sans coût additionnel.'
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
        currentPage="about"
      />

      {/* Hero Section */}
      <section className="px-4 py-12 lg:px-20 lg:py-20">
        <div className="max-w-4xl mx-auto text-center">
          <span className="inline-block bg-[rgba(210,163,11,0.1)] px-6 py-2 rounded-full mb-6 text-[#d2a30b] font-['Montserrat',sans-serif] text-sm">
            À propos de nous
          </span>
          <h1 className="text-[#1a1a1a] mb-6">
            Digital Kappa, votre partenaire digital
          </h1>
          <p className="text-[#4a5565] text-lg max-w-3xl mx-auto">
            Nous proposons des ressources numériques simples, efficaces et de qualité pour aider les créateurs, entrepreneurs et passionnés à accomplir plus en moins de temps.
          </p>

          {/* Stats */}
          <div className="mt-12 lg:mt-16 grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-8 max-w-6xl mx-auto">
            {stats.map((stat, index) => (
              <div key={index} className="text-center">
                <p className="text-[#d2a30b] text-2xl lg:text-4xl font-['Montserrat',sans-serif] mb-2">
                  {stat.value}
                </p>
                <p className="text-[#4a5565] text-sm lg:text-base">{stat.label}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Notre Histoire */}
      <section className="px-4 py-12 lg:px-20 lg:py-20 bg-gray-50">
        <div className="max-w-6xl mx-auto">
          <div className="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <div>
              <h2 className="text-[#1a1a1a] mb-6">Notre histoire</h2>
              <div className="space-y-4 text-[#4a5565]">
                <p>
                  Digital Kappa naît de l&apos;envie de proposer des ressources numériques simples, efficaces et de qualité pour aider les créateurs, entrepreneurs et passionnés à accomplir plus en moins de temps.
                </p>
                <p>
                  Le projet vise à rendre l&apos;accès aux outils digitaux plus rapide, plus clair et plus fiable. Contrairement aux marketplaces géantes où il est difficile de s&apos;y retrouver, nous proposons une sélection organisée qui évite la confusion.
                </p>
                <p>
                  Notre mission est de vous faire gagner du temps en vous proposant des produits prêts à l&apos;emploi, pensés pour être directement utilisables dans vos projets personnels ou professionnels.
                </p>
              </div>
            </div>
            <div className="rounded-2xl overflow-hidden shadow-lg">
              <div className="bg-gradient-to-br from-[#d2a30b] to-[#b8900a] aspect-video flex items-center justify-center">
                <div className="text-center text-white p-8">
                  <Users size={64} className="mx-auto mb-4 opacity-80" />
                  <p className="text-xl font-['Montserrat',sans-serif]">Notre équipe à votre service</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Nos Valeurs */}
      <section className="px-4 py-12 lg:px-20 lg:py-20">
        <div className="max-w-6xl mx-auto">
          <div className="text-center mb-12">
            <h2 className="text-[#1a1a1a] mb-4">Nos valeurs</h2>
            <p className="text-[#4a5565]">Ce qui nous guide au quotidien</p>
          </div>

          <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            {values.map((value, index) => {
              const Icon = value.icon;
              return (
                <div
                  key={index}
                  className="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow"
                >
                  <div className="bg-[rgba(210,163,11,0.1)] w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <Icon size={24} className="text-[#d2a30b]" />
                  </div>
                  <h3 className="font-['Merriweather',serif] text-[#1a1a1a] text-lg mb-2">
                    {value.title}
                  </h3>
                  <p className="text-[#4a5565] text-sm">{value.description}</p>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* Ce qui nous différencie */}
      <section className="px-4 py-12 lg:px-20 lg:py-20 bg-[#1a1a1a]">
        <div className="max-w-4xl mx-auto">
          <h2 className="text-white text-center mb-12">
            Ce qui nous différencie
          </h2>

          <div className="space-y-6">
            {differentiators.map((item, index) => (
              <div key={index} className="flex gap-4">
                <div className="flex-shrink-0">
                  <Check size={24} className="text-[#d2a30b]" />
                </div>
                <div>
                  <h3 className="font-['Merriweather',serif] text-white text-lg mb-1">
                    {item.title}
                  </h3>
                  <p className="text-gray-400 text-sm">{item.description}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Mission Statement */}
      <section className="px-4 py-12 lg:px-20 lg:py-20 bg-gray-50">
        <div className="max-w-4xl mx-auto">
          <h2 className="text-[#1a1a1a] text-center mb-8">
            À propos de Digital Kappa : Notre mission et nos valeurs
          </h2>
          <div className="max-w-none text-[#4a5565] space-y-4">
            <p>
              Digital Kappa est bien plus qu&apos;une simple marketplace de produits numériques. Nous aspirons à devenir le partenaire de confiance de tous les créateurs, développeurs et entrepreneurs qui souhaitent gagner du temps et se concentrer sur l&apos;essentiel : la création de valeur.
            </p>
            <p>
              Nous croyons fermement que l&apos;accès aux ressources digitales de qualité ne devrait pas être un parcours du combattant. C&apos;est pourquoi nous sélectionnons chaque produit avec soin, en veillant à ce qu&apos;il réponde aux standards les plus élevés en termes de fonctionnalité, de design et d&apos;utilisabilité.
            </p>
            <p>
              L&apos;innovation est au cœur de notre ADN. Nous restons constamment à l&apos;affût des nouvelles tendances et technologies pour enrichir notre catalogue et vous proposer les outils les plus modernes et performants du marché.
            </p>
            <p>
              Vous n&apos;êtes pas qu&apos;un simple client pour nous : vous faites partie de la communauté Digital Kappa. Votre réussite est notre réussite, et nous mettons tout en œuvre pour vous accompagner dans vos projets, avec un support technique réactif et une garantie satisfait ou remboursé de 14 jours.
            </p>
            <p>
              Notre engagement est simple : vous fournir des produits digitaux de qualité, accessibles, modernes et fiables, pour que vous puissiez vous concentrer sur ce qui compte vraiment - la réalisation de vos ambitions.
            </p>
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