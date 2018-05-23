/**********************/
/* By: Dumitru Petrov */
/* Lucrare nr.1  V.21 */
/**********************/

#include <graphics.h>
#include <stdio.h>
#include <stdlib.h>

void save()
{
	int i, j;
	FILE *f = fopen("save.txt", "w");
	for (i = 0; i < 640; i++)
	{
		for (j = 0; j < 480; j++)
		{
			fprintf(f, "%d\n", getpixel(i, j));
		}
	}
	fclose(f);
}

void load()
{
	int i, j;
	char buf[10];
	FILE *f = fopen("save.txt", "r");
	for (i = 0; i < 640; i++)
	{
		for (j = 0; j < 480; j++)
		{
			fgets(buf, 200, f);
			putpixel(i, j, atoi(buf));
		}
	}
	fclose(f);
}

int main()
{
	int	gd = DETECT, gm;

	initgraph(&gd, &gm, NULL);


	int w = getmaxy() / 3;
	int h = getmaxx() / 3;
	line(0, w, getmaxx(), getmaxy() / 3);
	line(0, w + w, getmaxx(), w + w);
	line(h, 0, h, getmaxy());
	line(h + h, 0, h + h, getmaxy());

	int xpmax = getmaxx();
	int ypmax = getmaxy();
	int xf = xpmax / 2;
	int yf = ypmax / 2;

	/* 8. SECTOR DE CERC - Colorat		*/
	setcolor(RED);
	pieslice(106, 80, 35, 220, 60);
	floodfill(106, 80, RED);
	/* 3. RECTANGLE 			*/
	setcolor(WHITE);
	rectangle(240, 100, 390, 30);
	/* 9. SECTOR DE ELIPSA - Colorat 	*/
	setcolor(MAGENTA);
	sector(534, 40, 45, 135, 100, 50);
	floodfill(534, 45, MAGENTA);
	/* 5. PARALELIPIPED 			*/
	setcolor(WHITE);
	bar3d(20, 200, 165, 300, 30, 1);
	/* 4. POLYGONE 25 virfuri - Colorat 	*/
	setcolor(GREEN);
	int pol[60] = {
		240,180,  260,160,  280,170,  300,180,  320,200,  340,185,  360,170,
		400,180,  360,200,  410,210,  360,230,  380,240,  360,255,  410,270,
		400,300,  380,305,  360,310,  320,280,  300,250,  280,310,
		240,300,  280,280,  230,270,  260,240,  230,210,
		240, 180
	};
	drawpoly(26, pol);
	floodfill(260, 200, GREEN);
	/* 1. LINE 				*/
	setcolor(WHITE);
	line(480, 190, 600, 280);
	/* 7. ELIPS - Colorat			*/
	setcolor(BLUE);
	ellipse(105, 400, 0, 360, 90, 40);
	floodfill(106, 400, BLUE);
	/* 2. TRIANGLE 				*/
	setcolor(WHITE);
	line(300, 350, 380, 450);
	line(270, 450, 380, 450);
	line(270, 450, 300, 350);
	/* 6. CIRCLE - Colorat			*/
	setcolor(YELLOW);
	circle(535, 400, 50);
	floodfill(535, 400, YELLOW);
	
	getch();
	save();
	cleardevice();
	getch();
	load();
	closegraph();
	return (0);
}
