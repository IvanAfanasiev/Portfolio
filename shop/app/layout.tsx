import './globals.css'
import type { Metadata } from 'next'
import { Inter } from 'next/font/google'
import { CreateHeader } from "@/Components/Header";
import { CreateFooter } from "@/Components/Footer";
import { CreateSideBar } from "@/Components/SideBar";

const inter = Inter({ subsets: ['latin'] })

export const metadata: Metadata = {
  title: 'Main',
  description: 'Created by me =)',
}

export default function RootLayout({
  children,
}: {
  children: React.ReactNode
}) {
  return (
    <html lang="en">
      <body className={inter.className}>
        
        <CreateHeader />
        <CreateSideBar />
        {/* inter.className */}
        <div className={'mainContent'}>{children}</div>
        
        <CreateFooter />
        
      </body>
    </html>
  )
}
