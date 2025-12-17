import { useState } from 'react';
import { ChevronLeft, ChevronRight } from 'lucide-react';

interface ProductCarouselProps {
  images: string[];
  productTitle: string;
}

export default function ProductCarousel({ images, productTitle }: ProductCarouselProps) {
  const [currentIndex, setCurrentIndex] = useState(0);

  const goToPrevious = () => {
    setCurrentIndex((prevIndex) => 
      prevIndex === 0 ? images.length - 1 : prevIndex - 1
    );
  };

  const goToNext = () => {
    setCurrentIndex((prevIndex) => 
      prevIndex === images.length - 1 ? 0 : prevIndex + 1
    );
  };

  const goToImage = (index: number) => {
    setCurrentIndex(index);
  };

  // Si une seule image, ne pas afficher le carrousel
  if (!images || images.length <= 1) {
    return (
      <div className="bg-gray-100 rounded-2xl overflow-hidden shadow-xl">
        <img 
          src={images?.[0] || ''} 
          alt={productTitle} 
          className="w-full h-auto object-cover"
        />
      </div>
    );
  }

  return (
    <div className="space-y-4">
      {/* Image principale */}
      <div className="relative bg-gray-100 rounded-2xl overflow-hidden shadow-xl group">
        <img 
          src={images[currentIndex]} 
          alt={`${productTitle} - Image ${currentIndex + 1}`} 
          className="w-full h-auto object-cover"
        />
        
        {/* Navigation arrows - visible au survol sur desktop, toujours visible sur mobile */}
        {images.length > 1 && (
          <>
            <button
              onClick={goToPrevious}
              className="absolute left-2 lg:left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-2 rounded-full shadow-lg transition-all opacity-100 lg:opacity-0 lg:group-hover:opacity-100"
              aria-label="Image précédente"
            >
              <ChevronLeft className="w-5 h-5 lg:w-6 lg:h-6 text-[#1a1a1a]" />
            </button>
            
            <button
              onClick={goToNext}
              className="absolute right-2 lg:right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-2 rounded-full shadow-lg transition-all opacity-100 lg:opacity-0 lg:group-hover:opacity-100"
              aria-label="Image suivante"
            >
              <ChevronRight className="w-5 h-5 lg:w-6 lg:h-6 text-[#1a1a1a]" />
            </button>
          </>
        )}

        {/* Indicateurs de position */}
        <div className="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
          {images.map((_, index) => (
            <button
              key={index}
              onClick={() => goToImage(index)}
              className={`w-2 h-2 rounded-full transition-all ${
                index === currentIndex 
                  ? 'bg-[#d2a30b] w-6' 
                  : 'bg-white/60 hover:bg-white/80'
              }`}
              aria-label={`Aller à l'image ${index + 1}`}
            />
          ))}
        </div>
      </div>

      {/* Miniatures - masquées sur mobile, visibles sur desktop */}
      {images.length > 1 && (
        <div className="hidden lg:grid grid-cols-4 gap-3">
          {images.map((image, index) => (
            <button
              key={index}
              onClick={() => goToImage(index)}
              className={`relative rounded-lg overflow-hidden transition-all ${
                index === currentIndex 
                  ? 'ring-2 ring-[#d2a30b] opacity-100' 
                  : 'opacity-60 hover:opacity-100'
              }`}
            >
              <img 
                src={image} 
                alt={`${productTitle} - Miniature ${index + 1}`} 
                className="w-full h-20 object-cover"
              />
              {index === currentIndex && (
                <div className="absolute inset-0 bg-[#d2a30b]/10" />
              )}
            </button>
          ))}
        </div>
      )}
    </div>
  );
}
