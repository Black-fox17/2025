import React from 'react';
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend,
  TimeScale,
} from 'chart.js';
import { Line } from 'react-chartjs-2';
import 'chartjs-adapter-date-fns';
import { StockData, PredictionData } from '../types/stock';

ChartJS.register(
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend,
  TimeScale
);

interface StockChartProps {
  historicalData: StockData[];
  predictionData: PredictionData[];
}

export function StockChart({ historicalData, predictionData }: StockChartProps) {
  const options = {
    responsive: true,
    interaction: {
      mode: 'index' as const,
      intersect: false,
    },
    scales: {
      x: {
        type: 'time' as const,
        time: {
          unit: 'hour' as const,
        },
        title: {
          display: true,
          text: 'Time',
        },
      },
      y: {
        title: {
          display: true,
          text: 'Price ($)',
        },
      },
    },
    plugins: {
      legend: {
        position: 'top' as const,
      },
      title: {
        display: true,
        text: 'Stock Price & Predictions',
      },
    },
  };

  const data = {
    datasets: [
      {
        label: 'Historical Price',
        data: historicalData.map((d) => ({
          x: d.timestamp,
          y: d.price,
        })),
        borderColor: 'rgb(75, 192, 192)',
        backgroundColor: 'rgba(75, 192, 192, 0.5)',
      },
      {
        label: 'Predicted Price',
        data: predictionData.map((d) => ({
          x: d.timestamp,
          y: d.predictedPrice,
        })),
        borderColor: 'rgb(255, 99, 132)',
        backgroundColor: 'rgba(255, 99, 132, 0.5)',
        borderDash: [5, 5],
      },
    ],
  };

  return (
    <div className="w-full h-[400px] bg-white rounded-lg shadow-lg p-4">
      <Line options={options} data={data} />
    </div>
  );
}