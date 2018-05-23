/**********************/
/* By. Dumitru Petrov */
/* Lab. 2 p.2 V21     */
/**********************/

#include <graphics.h>
#include <math.h>

#define G GREEN

int main()
{
	int gd = DETECT, gm;
	float ANGLE = 360/15 * M_PI/180;
	
	initgraph(&gd, &gm, NULL);
	int cx = getmaxx() / 2;
	int cy = getmaxy() / 2;
	int p[] = {cx-50,cy-150, cx+50,cy-150, cx+50,cy-50, cx-50,cy-50, cx-50,cy-150};

	outtextxy(cx, cy, "*");
	setcolor(G);
	
	int n, i, save;
	for (n = 0; n < 15; n++)
	{
		drawpoly(5, p);
		for (i = 0; i < 9; i+=2)
		{
			save = p[i];
			p[i] = p[i]*cos(ANGLE) - p[i+1]*sin(ANGLE) + cx - cx*cos(ANGLE) + cy*sin(ANGLE);
			p[i+1] = save*sin(ANGLE) + p[i+1]*cos(ANGLE) + cy - cx*sin(ANGLE) - cy*cos(ANGLE);
		}
	}

	getch();
	closegraph();
	return (0);
}
