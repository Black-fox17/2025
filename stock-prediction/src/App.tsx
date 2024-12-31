import React, { useState } from 'react';
import { StockChart } from './components/StockChart';
import { StockSelector } from './components/StockSelector';
import { PredictionCard } from './components/PredictionCard';
import { StockInfo } from './components/StockInfo';
import { StockData, PredictionData, StockMetadata } from './types/stock';

// Temporary mock data - replace with actual API calls
const mockHistoricalData: StockData[] = Array.from({ length: 24 }, (_, i) => ({
  timestamp: Date.now() - (23 - i) * 3600000,
  price: 150 + Math.random() * 10,
  volume: Math.floor(Math.random() * 1000000),
}));

const mockPredictionData: PredictionData[] = Array.from({ length: 8 }, (_, i) => ({
  timestamp: Date.now() + i * 3600000,
  predictedPrice: 155 + Math.random() * 10,
  confidence: 0.7 + Math.random() * 0.2,
}));

const mockMetadata: StockMetadata = {
  symbol: 'AAPL',
  companyName: 'Apple Inc.',
  currentPrice: 155.85,
  change: 2.35,
  changePercent: 1.53,
};

function App() {
  const [selectedStock, setSelectedStock] = useState('TSLA');

  const handleStockSelect = (symbol: string) => {
    setSelectedStock(symbol);
    // Here you would typically fetch new data for the selected stock
  };

  return (
    <div className="min-h-screen bg-gray-100">
      <header className="bg-white shadow-sm">
        <div className="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8">
          <h1 className="text-2xl font-bold text-gray-900">Stock Analysis & Prediction</h1>
        </div>
      </header>

      <main className="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div className="mb-8">
          <StockSelector onSelectStock={handleStockSelect} />
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-4 gap-6">
          <div className="lg:col-span-3 space-y-6">
            <StockInfo metadata={mockMetadata} />
            <StockChart 
              historicalData={mockHistoricalData}
              predictionData={mockPredictionData}
            />
          </div>
          
          <div className="lg:col-span-1">
            <PredictionCard
              latestPrediction={mockPredictionData[0]}
              currentPrice={mockMetadata.currentPrice}
            />
          </div>
        </div>
      </main>
    </div>
  );
}

export default App;