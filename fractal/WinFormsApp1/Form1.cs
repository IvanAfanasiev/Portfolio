using System;
using System.Drawing;
using System.Windows.Forms;

namespace WinFormsApp1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        
        
        int startLen = 200;
        int k = 5; //number of branches
        int minLen = 50;
        int lineWidth = 25; //the less, the thicker the line

        private void panel1_Paint(object sender, PaintEventArgs e)
        {
            DrawF(panel1.Width / 2, 0, startLen, 0, e);
        }
        
        public void DrawF(int x, int y, int len, double angle, PaintEventArgs e) 
        {
            Graphics g = e.Graphics;
            double x1, y1;
            x1 = x + len * Math.Sin(angle * Math.PI * 2 / 360.0);
            y1 = y + len * Math.Cos(angle * Math.PI * 2 / 360.0);
            g.DrawLine(new Pen(Color.Black, len / lineWidth), x, panel1.Height - y, (int)x1, panel1.Height - (int)y1);
            if (len > minLen)
            {
                for (int i = 0; i < k; i++)
                {
                    float dir = (90 + 90 / k) - (180 / k * (i + 1));
                    DrawF((int)x1, (int)y1, (int)(len / 1.25), angle + dir, e);
                }

                //or you can manually specify all the variables. e.g.:

                //DrawF((int)x1, (int)y1, (int)(len / 1.5), angle + 90, e);
                //DrawF((int)x1, (int)y1, (int)(len / 1.5), angle + 60, e);
                //DrawF((int)x1, (int)y1, (int)(len / 1.5), angle + 30, e);
                //DrawF((int)x1, (int)y1, (int)(len / 1.5), angle, e);
                //DrawF((int)x1, (int)y1, (int)(len / 1.5), angle - 30, e);
                //DrawF((int)x1, (int)y1, (int)(len / 1.5), angle - 60, e);
                //DrawF((int)x1, (int)y1, (int)(len / 1.5), angle - 90, e);
            }
        }
    }
}
