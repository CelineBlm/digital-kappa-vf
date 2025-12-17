import { Star } from 'lucide-react';
import { Product } from '../data/products';

interface ProductCardProps {
  product: Product;
  onProductClick?: () => void;
}

export default function ProductCard({ product, onProductClick }: ProductCardProps) {
  return (
    <div 
      onClick={onProductClick}
      className="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 cursor-pointer border border-gray-100"
    >
      {/* Image */}
      <div className="aspect-[4/3] overflow-hidden bg-gray-100">
        <img 
          src={product.image} 
          alt={product.title}
          className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
        />
      </div>

      {/* Content */}
      <div className="p-6 space-y-4">
        {/* Category badge */}
        <span className="inline-block bg-[rgba(210,163,11,0.1)] rounded-full px-3 py-1 text-xs text-[#d2a30b] font-['Montserrat',sans-serif]">
          {product.category}
        </span>

        {/* Title */}
        <h3 className="font-['Merriweather',serif] text-[#1a1a1a] line-clamp-2 min-h-[3.5rem]">
          {product.title}
        </h3>

        {/* Description */}
        <p className="text-sm text-gray-600 line-clamp-2 min-h-[2.5rem]">
          {product.description}
        </p>

        {/* Rating */}
        <div className="flex items-center gap-2">
          <div className="flex items-center gap-1">
            <Star className="w-4 h-4 fill-[#d2a30b] text-[#d2a30b]" />
            <span className="text-sm text-[#1a1a1a] font-['Montserrat',sans-serif]">
              {product.rating}
            </span>
          </div>
          <span className="text-xs text-gray-500">
            ({product.reviewCount} avis)
          </span>
        </div>

        {/* Price */}
        <div className="flex items-center justify-between pt-4 border-t border-gray-100">
          <div>
            <p className="text-xs text-gray-500 mb-1">Prix</p>
            <p className="text-2xl text-[#1a1a1a] font-['Montserrat',sans-serif]">
              {product.price}
            </p>
          </div>
          <button className="bg-[#d2a30b] text-white px-6 py-2.5 rounded-lg hover:bg-[#b8900a] transition-colors text-sm font-['Montserrat',sans-serif] font-semibold">
            Voir
          </button>
        </div>
      </div>
    </div>
  );
}