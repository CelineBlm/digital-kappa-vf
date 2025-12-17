interface FooterProps {
  onNavigateAbout?: () => void;
  onNavigateCGV?: () => void;
  onNavigatePrivacy?: () => void;
}

export default function Footer({ onNavigateAbout, onNavigateCGV, onNavigatePrivacy }: FooterProps) {
  return (
    <footer className="bg-[#1a1a1a] text-gray-400 py-12 px-4 lg:px-20">
      <div className="max-w-7xl mx-auto">
        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
          <div>
            <div className="flex items-center gap-2 mb-4">
              <div className="flex h-8 w-8 items-center justify-center rounded-lg bg-[#d2a30b]">
                <span className="text-lg font-bold text-white">DK</span>
              </div>
              <span className="text-xl font-bold text-white">Digital Kappa</span>
            </div>
            <p className="text-sm text-gray-400">
              Votre marketplace de produits digitaux premium
            </p>
          </div>
          
          <div>
            <h4 className="text-white mb-4">Catégories</h4>
            <ul className="space-y-2 text-sm">
              <li><a href="#" className="hover:text-[#d2a30b] transition-colors">Applications</a></li>
              <li><a href="#" className="hover:text-[#d2a30b] transition-colors">Ebooks</a></li>
              <li><a href="#" className="hover:text-[#d2a30b] transition-colors">Templates</a></li>
            </ul>
          </div>
          
          <div>
            <h4 className="text-white mb-4">Légal</h4>
            <ul className="space-y-2 text-sm">
              {onNavigateAbout && (
                <li>
                  <button 
                    onClick={onNavigateAbout}
                    className="hover:text-[#d2a30b] transition-colors text-left"
                  >
                    À propos
                  </button>
                </li>
              )}
              {onNavigateCGV && (
                <li>
                  <button 
                    onClick={onNavigateCGV}
                    className="hover:text-[#d2a30b] transition-colors text-left"
                  >
                    Conditions générales de vente
                  </button>
                </li>
              )}
              {onNavigatePrivacy && (
                <li>
                  <button 
                    onClick={onNavigatePrivacy}
                    className="hover:text-[#d2a30b] transition-colors text-left"
                  >
                    Politique de confidentialité
                  </button>
                </li>
              )}
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
