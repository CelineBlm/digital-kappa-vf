import { useState } from 'react';
import HomePage from './components/HomePage';
import HowItWorksPage from './HowItWorks';
import AllProductsPage from './AllProducts';
import EbooksPage from './Ebooks';
import ApplicationsPage from './Applications';
import TemplatesPage from './Templates';
import FAQPage from './FAQ';
import ProductDetailPage from './ProductDetail';
import AboutPage from './About';
import TermsOfSalePage from './TermsOfSale';
import PrivacyPolicyPage from './PrivacyPolicy';
import CheckoutPage from './Checkout';
import OrderConfirmationPage from './OrderConfirmation';
import { getProductById } from './data/products';

export default function App() {
  const [currentPage, setCurrentPage] = useState<'home' | 'how-it-works' | 'all-products' | 'ebooks' | 'applications' | 'templates' | 'faq' | 'product-detail' | 'about' | 'cgv' | 'privacy' | 'checkout' | 'order-confirmation'>('all-products');
  const [selectedProductId, setSelectedProductId] = useState<string>('guide-dev-moderne');
  const [productFilter, setProductFilter] = useState<'Ebook' | 'Application' | 'Template' | null>(null);
  const [checkoutProductId, setCheckoutProductId] = useState<string>('');
  const [orderData, setOrderData] = useState<any>(null);

  const handleNavigateToProduct = (productId: string) => {
    setSelectedProductId(productId);
    setCurrentPage('product-detail');
  };

  const handleNavigateToCheckout = (productId: string) => {
    setCheckoutProductId(productId);
    setCurrentPage('checkout');
  };

  const handleNavigateToOrderConfirmation = (data: any) => {
    setOrderData(data);
    setCurrentPage('order-confirmation');
  };

  const handleNavigateToEbooks = () => {
    setProductFilter('Ebook');
    setCurrentPage('all-products');
  };

  const handleNavigateToApplications = () => {
    setProductFilter('Application');
    setCurrentPage('all-products');
  };

  const handleNavigateToTemplates = () => {
    setProductFilter('Template');
    setCurrentPage('all-products');
  };

  const handleNavigateToAllProducts = () => {
    setProductFilter(null);
    setCurrentPage('all-products');
  };

  // Common navigation props for all pages
  const commonNavProps = {
    onNavigateHome: () => setCurrentPage('home'),
    onNavigateHowItWorks: () => setCurrentPage('how-it-works'),
    onNavigateAllProducts: handleNavigateToAllProducts,
    onNavigateEbooks: handleNavigateToEbooks,
    onNavigateApplications: handleNavigateToApplications,
    onNavigateTemplates: handleNavigateToTemplates,
    onNavigateFAQ: () => setCurrentPage('faq'),
    onNavigateAbout: () => setCurrentPage('about'),
    onNavigateCGV: () => setCurrentPage('cgv'),
    onNavigatePrivacy: () => setCurrentPage('privacy'),
  };

  if (currentPage === 'about') {
    return <AboutPage {...commonNavProps} />;
  }

  if (currentPage === 'cgv') {
    return <TermsOfSalePage {...commonNavProps} />;
  }

  if (currentPage === 'privacy') {
    return <PrivacyPolicyPage {...commonNavProps} />;
  }

  if (currentPage === 'product-detail') {
    return (
      <ProductDetailPage 
        productId={selectedProductId}
        {...commonNavProps}
        onNavigateProductDetail={handleNavigateToProduct}
        onNavigateCheckout={handleNavigateToCheckout}
      />
    );
  }

  if (currentPage === 'how-it-works') {
    return <HowItWorksPage {...commonNavProps} />;
  }

  if (currentPage === 'all-products') {
    return (
      <AllProductsPage 
        initialFilter={productFilter}
        {...commonNavProps}
        onNavigateProductDetail={handleNavigateToProduct}
      />
    );
  }

  if (currentPage === 'ebooks') {
    return <EbooksPage {...commonNavProps} />;
  }

  if (currentPage === 'applications') {
    return <ApplicationsPage {...commonNavProps} />;
  }

  if (currentPage === 'templates') {
    return <TemplatesPage {...commonNavProps} />;
  }

  if (currentPage === 'faq') {
    return <FAQPage {...commonNavProps} />;
  }

  if (currentPage === 'checkout') {
    const product = getProductById(checkoutProductId);
    if (!product) {
      setCurrentPage('all-products');
      return null;
    }
    return (
      <CheckoutPage 
        product={product}
        {...commonNavProps}
        onNavigateBack={() => {
          setSelectedProductId(checkoutProductId);
          setCurrentPage('product-detail');
        }}
        onOrderComplete={handleNavigateToOrderConfirmation}
      />
    );
  }

  if (currentPage === 'order-confirmation') {
    return (
      <OrderConfirmationPage 
        orderData={orderData}
        {...commonNavProps}
      />
    );
  }

  return (
    <HomePage 
      onNavigateHowItWorks={() => setCurrentPage('how-it-works')}
      onNavigateAllProducts={handleNavigateToAllProducts}
      onNavigateEbooks={handleNavigateToEbooks}
      onNavigateApplications={handleNavigateToApplications}
      onNavigateTemplates={handleNavigateToTemplates}
      onNavigateFAQ={() => setCurrentPage('faq')}
      onNavigateAbout={() => setCurrentPage('about')}
      onNavigateCGV={() => setCurrentPage('cgv')}
      onNavigatePrivacy={() => setCurrentPage('privacy')}
    />
  );
}