import { useState, useEffect } from 'react';
import { ChevronRight, ChevronDown, Filter, Star, X, Mail, MapPin } from 'lucide-react';
import Header from './components/Header';
import ProductCard from './components/ProductCard';
import { products } from './data/products';
import Icon from './imports/Icon-11-8611';

interface AllProductsProps {
  onNavigateHome: () => void;
  onNavigateHowItWorks: () => void;
  onNavigateEbooks?: () => void;
  onNavigateApplications?: () => void;
  onNavigateTemplates?: () => void;
  onNavigateFAQ?: () => void;
  onNavigateProductDetail?: (productId: string) => void;
  initialFilter?: 'Ebook' | 'Application' | 'Template' | null;
  onNavigateAbout?: () => void;
  onNavigateCGV?: () => void;
  onNavigatePrivacy?: () => void;
}

export default function AllProducts({ 
  onNavigateHome, 
  onNavigateHowItWorks, 
  onNavigateEbooks, 
  onNavigateApplications, 
  onNavigateTemplates, 
  onNavigateFAQ, 
  onNavigateProductDetail,
  initialFilter,
  onNavigateAbout,
  onNavigateCGV,
  onNavigatePrivacy
}: AllProductsProps) {
  const [selectedCategories, setSelectedCategories] = useState<string[]>(
    initialFilter ? [initialFilter] : []
  );
  const [selectedPriceRange, setSelectedPriceRange] = useState<string>('');
  const [selectedRating, setSelectedRating] = useState<number | null>(null);
  const [showFilters, setShowFilters] = useState(false);
  const [sortBy, setSortBy] = useState('recent');
  const [showSortDropdown, setShowSortDropdown] = useState(false);

  // Update filter when initialFilter changes
  useEffect(() => {
    if (initialFilter) {
      setSelectedCategories([initialFilter]);
    }
  }, [initialFilter]);

  const toggleCategory = (category: string) => {
    setSelectedCategories(prev =>
      prev.includes(category) ? prev.filter(c => c !== category) : [...prev, category]
    );
  };

  const resetFilters = () => {
    setSelectedCategories([]);
    setSelectedPriceRange('');
    setSelectedRating(null);
  };

  // Filter products
  let filteredProducts = [...products];

  // Filter by category
  if (selectedCategories.length > 0) {
    filteredProducts = filteredProducts.filter(p =>
      selectedCategories.includes(p.category)
    );
  }

  // Filter by price
  if (selectedPriceRange) {
    filteredProducts = filteredProducts.filter(p => {
      const price = parseInt(p.price.replace(/[^0-9]/g, ''));
      switch (selectedPriceRange) {
        case 'under50':
          return price < 50;
        case '50to100':
          return price >= 50 && price < 100;
        case '100to200':
          return price >= 100 && price < 200;
        case 'over200':
          return price >= 200;
        default:
          return true;
      }
    });
  }

  // Filter by rating
  if (selectedRating) {
    filteredProducts = filteredProducts.filter(p => p.rating >= selectedRating);
  }

  // Sort products
  filteredProducts.sort((a, b) => {
    switch (sortBy) {
      case 'price-asc':
        return parseInt(a.price.replace(/[^0-9]/g, '')) - parseInt(b.price.replace(/[^0-9]/g, ''));
      case 'price-desc':
        return parseInt(b.price.replace(/[^0-9]/g, '')) - parseInt(a.price.replace(/[^0-9]/g, ''));
      case 'rating':
        return b.rating - a.rating;
      default:
        return 0;
    }
  });

  const ebooks = products.filter(p => p.category === 'Ebook').length;
  const apps = products.filter(p => p.category === 'Application').length;
  const temps = products.filter(p => p.category === 'Template').length;

  const categories = [
    { id: 'Ebook', label: 'Ebooks', count: ebooks },
    { id: 'Application', label: 'Applications', count: apps },
    { id: 'Template', label: 'Templates', count: temps }
  ];

  const priceRanges = [
    { id: 'under50', label: 'Moins de 50 €' },
    { id: '50to100', label: '50 € - 100 €' },
    { id: '100to200', label: '100 € - 200 €' },
    { id: 'over200', label: 'Plus de 200 €' }
  ];

  return (
    <div className="min-h-screen bg-white">
      <Header 
        onNavigateHome={onNavigateHome}
        onNavigateHowItWorks={onNavigateHowItWorks}
        onNavigateAllProducts={() => {}}
        onNavigateEbooks={onNavigateEbooks}
        onNavigateApplications={onNavigateApplications}
        onNavigateTemplates={onNavigateTemplates}
        onNavigateFAQ={onNavigateFAQ}
        currentPage="all-products"
      />
      
      {/* Breadcrumb */}
      <div className="px-4 lg:px-20 py-6 border-b border-gray-100">
        <div className="flex items-center gap-2 text-sm">
          <button onClick={onNavigateHome} className="text-gray-500 hover:text-[#d2a30b]">
            Accueil
          </button>
          <ChevronRight size={16} className="text-gray-400" />
          <span className="text-[#1a1a1a]">Tous nos produits</span>
        </div>
      </div>
      
      {/* Main Content */}
      <section className="py-8 lg:py-12 px-4 lg:px-20">
        <div className="max-w-7xl mx-auto">
          <div className="grid lg:grid-cols-[280px_1fr] gap-8">
            {/* Filters - Mobile Button */}
            <div className="lg:hidden mb-4">
              <button 
                onClick={() => setShowFilters(!showFilters)}
                className="w-full flex items-center justify-between bg-white border border-gray-200 rounded-lg px-4 py-3"
              >
                <div className="flex items-center gap-2">
                  <Filter size={20} className="text-[#d2a30b]" />
                  <span className="text-[#1a1a1a]">Filtres</span>
                </div>
                <ChevronDown size={20} className={`transition-transform ${showFilters ? 'rotate-180' : ''}`} />
              </button>
            </div>

            {/* Filters Panel */}
            <aside className={`${showFilters ? 'block' : 'hidden'} lg:block`}>
              <div className="bg-white border border-gray-100 rounded-xl p-6 lg:sticky lg:top-24">
                <div className="flex items-center justify-between mb-6 lg:hidden">
                  <h3 className="font-['Merriweather',serif] text-[#1a1a1a]">Filtres</h3>
                  <button onClick={() => setShowFilters(false)}>
                    <X size={20} />
                  </button>
                </div>

                {/* Categories */}
                <div className="mb-8">
                  <h4 className="font-['Montserrat',sans-serif] text-[#1a1a1a] mb-4">Catégories</h4>
                  <div className="space-y-3">
                    {categories.map(category => (
                      <label key={category.id} className="flex items-center gap-3 cursor-pointer group">
                        <input 
                          type="checkbox"
                          checked={selectedCategories.includes(category.id)}
                          onChange={() => toggleCategory(category.id)}
                          className="w-4 h-4 rounded border-gray-300 text-[#d2a30b] focus:ring-[#d2a30b]"
                        />
                        <span className="text-sm text-[#4a5565] group-hover:text-[#1a1a1a]">
                          {category.label} <span className="text-gray-400">({category.count})</span>
                        </span>
                      </label>
                    ))}
                  </div>
                </div>

                {/* Price Range */}
                <div className="mb-8">
                  <h4 className="font-['Montserrat',sans-serif] text-[#1a1a1a] mb-4">Prix</h4>
                  <div className="space-y-3">
                    {priceRanges.map(range => (
                      <label key={range.id} className="flex items-center gap-3 cursor-pointer group">
                        <input 
                          type="radio"
                          name="priceRange"
                          checked={selectedPriceRange === range.id}
                          onChange={() => setSelectedPriceRange(range.id)}
                          className="w-4 h-4 border-gray-300 text-[#d2a30b] focus:ring-[#d2a30b]"
                        />
                        <span className="text-sm text-[#4a5565] group-hover:text-[#1a1a1a]">{range.label}</span>
                      </label>
                    ))}
                  </div>
                </div>

                {/* Rating */}
                <div className="mb-8">
                  <h4 className="font-['Montserrat',sans-serif] text-[#1a1a1a] mb-4">Note minimale</h4>
                  <div className="space-y-3">
                    {[5, 4, 3].map(rating => (
                      <label key={rating} className="flex items-center gap-2 cursor-pointer group">
                        <input 
                          type="radio"
                          name="rating"
                          checked={selectedRating === rating}
                          onChange={() => setSelectedRating(rating)}
                          className="w-4 h-4 border-gray-300 text-[#d2a30b] focus:ring-[#d2a30b]"
                        />
                        <div className="flex items-center gap-1">
                          {Array.from({ length: rating }).map((_, i) => (
                            <Star key={i} size={14} fill="#d2a30b" stroke="#d2a30b" />
                          ))}
                          {Array.from({ length: 5 - rating }).map((_, i) => (
                            <Star key={`empty-${i}`} size={14} stroke="#d2a30b" />
                          ))}
                          <span className="text-sm text-[#4a5565] ml-1">& plus</span>
                        </div>
                      </label>
                    ))}
                  </div>
                </div>

                {/* Reset button */}
                <button 
                  onClick={resetFilters}
                  className="w-full bg-gray-50 text-[#1a1a1a] border border-gray-200 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors text-sm"
                >
                  Réinitialiser les filtres
                </button>
              </div>
            </aside>

            {/* Products */}
            <main>
              <div className="flex items-center justify-between mb-6">
                <p className="text-sm text-[#4a5565]">{filteredProducts.length} produit{filteredProducts.length > 1 ? 's' : ''} trouvé{filteredProducts.length > 1 ? 's' : ''}</p>
                <div className="relative">
                  <button 
                    onClick={() => setShowSortDropdown(!showSortDropdown)}
                    className="flex items-center gap-2 text-sm border border-gray-200 rounded-lg px-4 py-2.5 text-[#1a1a1a] bg-white font-['Montserrat',sans-serif] hover:border-[#d2a30b] focus:border-[#d2a30b] focus:ring-2 focus:ring-[#d2a30b]/20 outline-none cursor-pointer transition-all"
                  >
                    <span>
                      {sortBy === 'recent' && 'Plus récents'}
                      {sortBy === 'price-asc' && 'Prix croissant'}
                      {sortBy === 'price-desc' && 'Prix décroissant'}
                      {sortBy === 'rating' && 'Meilleures notes'}
                    </span>
                    <ChevronDown size={16} className={`transition-transform ${showSortDropdown ? 'rotate-180' : ''}`} />
                  </button>
                  
                  {showSortDropdown && (
                    <>
                      <div 
                        className="fixed inset-0 z-10" 
                        onClick={() => setShowSortDropdown(false)}
                      />
                      <div className="absolute right-0 top-full mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-20 py-1 font-['Montserrat',sans-serif]">
                        <button
                          onClick={() => {
                            setSortBy('recent');
                            setShowSortDropdown(false);
                          }}
                          className={`w-full text-left px-4 py-2.5 text-sm transition-colors ${
                            sortBy === 'recent' 
                              ? 'bg-[rgba(210,163,11,0.1)] text-[#d2a30b]' 
                              : 'text-[#4a5565] hover:bg-gray-50 hover:text-[#d2a30b]'
                          }`}
                        >
                          Plus récents
                        </button>
                        <button
                          onClick={() => {
                            setSortBy('price-asc');
                            setShowSortDropdown(false);
                          }}
                          className={`w-full text-left px-4 py-2.5 text-sm transition-colors ${
                            sortBy === 'price-asc' 
                              ? 'bg-[rgba(210,163,11,0.1)] text-[#d2a30b]' 
                              : 'text-[#4a5565] hover:bg-gray-50 hover:text-[#d2a30b]'
                          }`}
                        >
                          Prix croissant
                        </button>
                        <button
                          onClick={() => {
                            setSortBy('price-desc');
                            setShowSortDropdown(false);
                          }}
                          className={`w-full text-left px-4 py-2.5 text-sm transition-colors ${
                            sortBy === 'price-desc' 
                              ? 'bg-[rgba(210,163,11,0.1)] text-[#d2a30b]' 
                              : 'text-[#4a5565] hover:bg-gray-50 hover:text-[#d2a30b]'
                          }`}
                        >
                          Prix décroissant
                        </button>
                        <button
                          onClick={() => {
                            setSortBy('rating');
                            setShowSortDropdown(false);
                          }}
                          className={`w-full text-left px-4 py-2.5 text-sm transition-colors ${
                            sortBy === 'rating' 
                              ? 'bg-[rgba(210,163,11,0.1)] text-[#d2a30b]' 
                              : 'text-[#4a5565] hover:bg-gray-50 hover:text-[#d2a30b]'
                          }`}
                        >
                          Meilleures notes
                        </button>
                      </div>
                    </>
                  )}
                </div>
              </div>

              {filteredProducts.length > 0 ? (
                <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                  {filteredProducts.map((product) => (
                    <ProductCard 
                      key={product.id} 
                      product={product}
                      onProductClick={() => onNavigateProductDetail?.(product.id)}
                    />
                  ))}
                </div>
              ) : (
                <div className="text-center py-20">
                  <p className="text-gray-500 mb-4">Aucun produit ne correspond à vos critères</p>
                  <button 
                    onClick={resetFilters}
                    className="text-[#d2a30b] hover:underline"
                  >
                    Réinitialiser les filtres
                  </button>
                </div>
              )}
            </main>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-[#1a1a1a] text-gray-400 py-12 px-4 lg:px-20">
        <div className="max-w-7xl mx-auto">
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            <div>
              <div className="mb-6">
                <div className="flex items-center gap-2">
                  <div className="w-10 h-10 rounded flex items-center justify-center">
                    <Icon />
                  </div>
                </div>
              </div>
              <p className="text-sm text-[#99a1af] leading-6">
                Des ressources numériques simples et de qualité pour créateurs, entrepreneurs et passionnés.
              </p>
            </div>
            
            <div>
              <h4 className="text-white mb-4 font-['Merriweather',serif]">Légal</h4>
              <ul className="space-y-3 text-sm">
                <li><button onClick={onNavigateAbout} className="text-[#99a1af] hover:text-[#d2a30b] transition-colors">À propos</button></li>
                <li><button onClick={onNavigateCGV} className="text-[#99a1af] hover:text-[#d2a30b] transition-colors">CGV</button></li>
                <li><button onClick={onNavigatePrivacy} className="text-[#99a1af] hover:text-[#d2a30b] transition-colors">Confidentialité</button></li>
              </ul>
            </div>
            
            <div>
              <h4 className="text-white mb-4 font-['Merriweather',serif]">Catégories</h4>
              <ul className="space-y-3 text-sm">
                <li><button onClick={onNavigateEbooks} className="text-[#99a1af] hover:text-[#d2a30b] transition-colors">Ebooks</button></li>
                <li><button onClick={onNavigateApplications} className="text-[#99a1af] hover:text-[#d2a30b] transition-colors">Applications</button></li>
                <li><button onClick={onNavigateTemplates} className="text-[#99a1af] hover:text-[#d2a30b] transition-colors">Templates</button></li>
              </ul>
            </div>
            
            <div>
              <h4 className="text-white mb-4 font-['Merriweather',serif]">Contact</h4>
              <ul className="space-y-4">
                <li className="flex items-start gap-3">
                  <Mail className="w-5 h-5 text-[#d2a30b] mt-0.5 shrink-0" />
                  <div>
                    <p className="text-white text-sm mb-1">Email</p>
                    <p className="text-[#99a1af] text-sm">contact@digitalkappa.com</p>
                  </div>
                </li>
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