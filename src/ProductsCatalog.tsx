import { useState } from 'react';
import Header from './components/Header';
import ProductCard from './components/ProductCard';
import { products } from './data/products';

interface ProductsCatalogProps {
  onNavigateHome: () => void;
  onNavigateHowItWorks: () => void;
  onNavigateAllProducts: () => void;
  onNavigateEbooks?: () => void;
  onNavigateApplications?: () => void;
  onNavigateTemplates?: () => void;
  onNavigateFAQ?: () => void;
  onNavigateProductDetail?: (productId: string) => void;
}

type FilterCategory = 'all' | 'Ebook' | 'Application' | 'Template';

export default function ProductsCatalog({
  onNavigateHome,
  onNavigateHowItWorks,
  onNavigateAllProducts,
  onNavigateEbooks,
  onNavigateApplications,
  onNavigateTemplates,
  onNavigateFAQ,
  onNavigateProductDetail
}: ProductsCatalogProps) {
  const [activeFilter, setActiveFilter] = useState<FilterCategory>('all');

  const filteredProducts = activeFilter === 'all' 
    ? products 
    : products.filter(p => p.category === activeFilter);

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

      {/* Hero Section */}
      <section className="bg-gradient-to-b from-gray-50 to-white py-12 lg:py-20 px-4 lg:px-20 border-b border-gray-100">
        <div className="max-w-7xl mx-auto text-center">
          <div className="inline-flex items-center gap-2 bg-white border border-gray-100 rounded-full px-4 py-2 shadow-sm mb-6">
            <div className="w-2 h-2 bg-[#d2a30b] rounded-full"></div>
            <p className="text-sm text-[#0d1421]">Catalogue complet</p>
          </div>
          
          <h1 className="font-['Merriweather',serif] text-[#0d1421] mb-4">
            Tous nos produits digitaux
          </h1>
          
          <p className="text-[rgba(13,20,33,0.7)] max-w-2xl mx-auto mb-8">
            Découvrez notre sélection complète d&apos;ebooks, applications et templates premium pour booster vos projets
          </p>

          {/* Filtres */}
          <div className="flex flex-wrap items-center justify-center gap-3">
            <button
              onClick={() => setActiveFilter('all')}
              className={`px-6 py-2.5 rounded-full transition-all ${
                activeFilter === 'all'
                  ? 'bg-[#d2a30b] text-white'
                  : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
              }`}
            >
              Tous ({products.length})
            </button>
            <button
              onClick={() => setActiveFilter('Ebook')}
              className={`px-6 py-2.5 rounded-full transition-all ${
                activeFilter === 'Ebook'
                  ? 'bg-[#d2a30b] text-white'
                  : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
              }`}
            >
              Ebooks ({products.filter(p => p.category === 'Ebook').length})
            </button>
            <button
              onClick={() => setActiveFilter('Application')}
              className={`px-6 py-2.5 rounded-full transition-all ${
                activeFilter === 'Application'
                  ? 'bg-[#d2a30b] text-white'
                  : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
              }`}
            >
              Applications ({products.filter(p => p.category === 'Application').length})
            </button>
            <button
              onClick={() => setActiveFilter('Template')}
              className={`px-6 py-2.5 rounded-full transition-all ${
                activeFilter === 'Template'
                  ? 'bg-[#d2a30b] text-white'
                  : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
              }`}
            >
              Templates ({products.filter(p => p.category === 'Template').length})
            </button>
          </div>
        </div>
      </section>

      {/* Grille de produits */}
      <section className="py-12 lg:py-20 px-4 lg:px-20">
        <div className="max-w-7xl mx-auto">
          <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            {filteredProducts.map((product) => (
              <ProductCard
                key={product.id}
                image={product.image}
                category={product.category}
                title={product.title}
                description={product.description}
                price={product.price}
                rating={product.rating}
                reviewCount={product.reviewCount}
                onProductClick={() => onNavigateProductDetail?.(product.id)}
              />
            ))}
          </div>

          {filteredProducts.length === 0 && (
            <div className="text-center py-20">
              <p className="text-gray-500">Aucun produit trouvé dans cette catégorie</p>
            </div>
          )}
        </div>
      </section>

      {/* CTA Section */}
      <section className="bg-[#2b2d31] py-16 px-4 lg:px-20">
        <div className="max-w-4xl mx-auto text-center">
          <h2 className="font-['Merriweather',serif] text-white mb-6">
            Vous ne trouvez pas ce que vous cherchez ?
          </h2>
          <p className="text-gray-300 mb-8 max-w-2xl mx-auto">
            Notre équipe est à votre écoute pour vous aider à trouver le produit parfait pour votre projet ou répondre à vos questions.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <button 
              onClick={onNavigateFAQ}
              className="bg-white text-[#2b2d31] px-8 py-3 rounded-lg hover:bg-gray-100 transition-colors font-['Montserrat',sans-serif] font-semibold"
            >
              Voir la FAQ
            </button>
            <button className="border border-white text-white px-8 py-3 rounded-lg hover:bg-white hover:text-[#2b2d31] transition-colors font-['Montserrat',sans-serif] font-semibold">
              Nous contacter
            </button>
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
