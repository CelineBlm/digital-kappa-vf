import { useState } from 'react';
import { Menu, X, Search } from 'lucide-react';
import svgPaths from "../imports/svg-m5wcxxm8qg";
import { imgVector } from "../imports/svg-ie8rj";

interface HeaderProps {
  onNavigateHome: () => void;
  onNavigateHowItWorks: () => void;
  onNavigateAllProducts: () => void;
  onNavigateEbooks?: () => void;
  onNavigateApplications?: () => void;
  onNavigateTemplates?: () => void;
  onNavigateFAQ?: () => void;
  currentPage?: 'home' | 'how-it-works' | 'all-products' | 'ebooks' | 'applications' | 'templates' | 'faq';
}

function Logo({ onClick }: { onClick: () => void }) {
  return (
    <button onClick={onClick} className="flex items-center gap-3">
      <div className="h-8 w-12 relative overflow-clip">
        <div className="absolute bottom-0 left-0 right-[35%] top-0" style={{ maskImage: `url('${imgVector}')`, maskSize: '48px 32px', maskRepeat: 'no-repeat' }}>
          <svg className="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 29 32">
            <path d={svgPaths.p28d89680} fill="#D2A30B" />
          </svg>
        </div>
        <div className="absolute bottom-0 left-[65%] right-0 top-0" style={{ maskImage: `url('${imgVector}')`, maskSize: '48px 32px', maskRepeat: 'no-repeat', maskPosition: '-31.112px 0px' }}>
          <svg className="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 17 32">
            <path d={svgPaths.p2133f840} fill="#D2A30B" />
          </svg>
        </div>
      </div>
      <div className="flex flex-col items-start">
        <span className="font-['Montserrat',sans-serif] text-[#1a1a1a]">Digital Kappa</span>
        <span className="text-[10px] font-['Montserrat',sans-serif] text-[#d2a30b] tracking-wide">PRODUITS DIGITAUX PREMIUM</span>
      </div>
    </button>
  );
}

function MobileNav({ 
  onNavigateHome, 
  onNavigateHowItWorks, 
  onNavigateAllProducts,
  onNavigateEbooks,
  onNavigateApplications,
  onNavigateTemplates,
  onNavigateFAQ
}: { 
  onNavigateHome: () => void;
  onNavigateHowItWorks: () => void;
  onNavigateAllProducts: () => void;
  onNavigateEbooks?: () => void;
  onNavigateApplications?: () => void;
  onNavigateTemplates?: () => void;
  onNavigateFAQ?: () => void;
}) {
  const [isOpen, setIsOpen] = useState(false);
  
  const handleNavigation = (callback: () => void) => {
    callback();
    setIsOpen(false);
  };

  return (
    <>
      <button 
        onClick={() => setIsOpen(!isOpen)}
        className="lg:hidden p-2"
        aria-label="Menu"
      >
        {isOpen ? <X size={24} /> : <Menu size={24} />}
      </button>
      
      {isOpen && (
        <div className="lg:hidden absolute top-full left-0 right-0 bg-white border-b border-gray-200 shadow-lg z-50">
          <nav className="flex flex-col p-4 gap-3">
            <button onClick={() => handleNavigation(onNavigateHome)} className="py-2 text-[#364153] hover:text-[#d2a30b] text-left">
              Accueil
            </button>
            <button onClick={() => handleNavigation(onNavigateAllProducts)} className="py-2 text-[#364153] hover:text-[#d2a30b] text-left">
              Tous nos produits
            </button>
            {onNavigateEbooks && (
              <button onClick={() => handleNavigation(onNavigateEbooks)} className="py-2 text-[#364153] hover:text-[#d2a30b] text-left">
                Ebooks
              </button>
            )}
            {onNavigateApplications && (
              <button onClick={() => handleNavigation(onNavigateApplications)} className="py-2 text-[#364153] hover:text-[#d2a30b] text-left">
                Applications
              </button>
            )}
            {onNavigateTemplates && (
              <button onClick={() => handleNavigation(onNavigateTemplates)} className="py-2 text-[#364153] hover:text-[#d2a30b] text-left">
                Templates
              </button>
            )}
            {onNavigateFAQ && (
              <button onClick={() => handleNavigation(onNavigateFAQ)} className="py-2 text-[#364153] hover:text-[#d2a30b] text-left">
                FAQ
              </button>
            )}
            <button onClick={() => handleNavigation(onNavigateHowItWorks)} className="py-2 text-[#364153] hover:text-[#d2a30b] text-left">
              Comment ça marche
            </button>
          </nav>
        </div>
      )}
    </>
  );
}

export default function Header({ 
  onNavigateHome, 
  onNavigateHowItWorks, 
  onNavigateAllProducts,
  onNavigateEbooks,
  onNavigateApplications,
  onNavigateTemplates,
  onNavigateFAQ,
  currentPage = 'home'
}: HeaderProps) {
  return (
    <header className="bg-white border-b border-gray-200 sticky top-0 z-40">
      <div className="px-4 lg:px-28 py-4 relative flex items-center justify-between">
        <Logo onClick={onNavigateHome} />
        
        {/* Desktop search */}
        <div className="hidden lg:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-[600px]">
          <div className="relative w-full">
            <input 
              type="text" 
              placeholder="Rechercher un produit, ebook, template..."
              className="w-full bg-gray-50 border border-gray-200 rounded-lg px-11 py-2.5 text-sm"
            />
            <Search className="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400" size={18} />
          </div>
        </div>
        
        <MobileNav 
          onNavigateHome={onNavigateHome}
          onNavigateHowItWorks={onNavigateHowItWorks}
          onNavigateAllProducts={onNavigateAllProducts}
          onNavigateEbooks={onNavigateEbooks}
          onNavigateApplications={onNavigateApplications}
          onNavigateTemplates={onNavigateTemplates}
          onNavigateFAQ={onNavigateFAQ}
        />
      </div>
      
      {/* Search bar - mobile */}
      <div className="lg:hidden px-4 pb-3 relative">
        <input 
          type="text" 
          placeholder="Rechercher un produit..."
          className="w-full bg-gray-50 border border-gray-200 rounded-lg px-10 py-2.5 text-sm"
        />
        <Search className="absolute left-7 top-1/2 -translate-y-1/2 text-gray-400" size={18} />
      </div>
      
      {/* Desktop navigation */}
      <nav className="hidden lg:flex border-t border-gray-100 px-28 gap-8">
        <button 
          onClick={onNavigateHome} 
          className={`py-3 text-sm text-[#364153] hover:text-[#d2a30b] ${currentPage === 'home' ? 'border-b-2 border-[#d2a30b]' : ''}`}
        >
          Accueil
        </button>
        <button 
          onClick={onNavigateAllProducts} 
          className={`py-3 text-sm text-[#364153] hover:text-[#d2a30b] ${currentPage === 'all-products' ? 'border-b-2 border-[#d2a30b]' : ''}`}
        >
          Tous nos produits
        </button>
        {onNavigateEbooks && (
          <button 
            onClick={onNavigateEbooks} 
            className={`py-3 text-sm text-[#364153] hover:text-[#d2a30b] ${currentPage === 'ebooks' ? 'border-b-2 border-[#d2a30b]' : ''}`}
          >
            Ebooks
          </button>
        )}
        {onNavigateApplications && (
          <button 
            onClick={onNavigateApplications} 
            className={`py-3 text-sm text-[#364153] hover:text-[#d2a30b] ${currentPage === 'applications' ? 'border-b-2 border-[#d2a30b]' : ''}`}
          >
            Applications
          </button>
        )}
        {onNavigateTemplates && (
          <button 
            onClick={onNavigateTemplates} 
            className={`py-3 text-sm text-[#364153] hover:text-[#d2a30b] ${currentPage === 'templates' ? 'border-b-2 border-[#d2a30b]' : ''}`}
          >
            Templates
          </button>
        )}
        {onNavigateFAQ && (
          <button 
            onClick={onNavigateFAQ} 
            className={`py-3 text-sm text-[#364153] hover:text-[#d2a30b] ${currentPage === 'faq' ? 'border-b-2 border-[#d2a30b]' : ''}`}
          >
            FAQ
          </button>
        )}
        <button 
          onClick={onNavigateHowItWorks} 
          className={`py-3 text-sm text-[#364153] hover:text-[#d2a30b] ${currentPage === 'how-it-works' ? 'border-b-2 border-[#d2a30b]' : ''}`}
        >
          Comment ça marche
        </button>
      </nav>
    </header>
  );
}