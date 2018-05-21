/**********************/
/* By. Dumitru Petrov */
/* Lab. 2 p.2 V21     */
/**********************/

#include <graphics.h>
#include <math.h>

#define G GREEN
#define X_AXIS	2
#define Y_AXIS	7

void	draw_last(float direction)
{
	double x = 0, y, px, py, cx = getmaxx()/2, cy = getmaxy()/2;

	while (x <= X_AXIS && x >= -X_AXIS) {
		/* Calculate y with given x */
		y = 4 * pow(x, 7) - 3 * pow(x, 3) + 5;
		
		/* Calculate coordoninates to display */
		px = x * cx / X_AXIS + cx;
		/* -cy because of origin point in window(top left corner) */
		py = y * -cy / Y_AXIS + cy;
		/* in case boundaries are passed */
		if (py < 0 || py > getmaxy())
			break;

		if (x == 0) // only for first loop
			moveto(px, py);
		/* Draw segment line */
		lineto(px, py);
		/* update CP */
		moveto(px, py);

		x += direction;
		delay(20);
	}
}

int main()
{
	int gd = DETECT, gm;
	
	initgraph(&gd, &gm, NULL);

	/* Draw the axis */
	int cx = getmaxx()/2, cy = getmaxy()/2;

	line(20, cy, getmaxx()-20, cy);
	line(cx, 20, cx, getmaxy()-20);
	outtextxy(cx, cy, "O");
	outtextxy(20, cy, "-2");
	outtextxy(getmaxx()-20, cy, "2");
	outtextxy(cx, 20, "7");
	outtextxy(cx, getmaxy()-20, "-7");

	//y=5*x-3*sinx^2(k*x) y=cos(k*x) y=4x^7-3x^3+5
	setcolor(GREEN);
	setlinestyle(SOLID_LINE, 0, 2);


	draw_last(0.01);
	draw_last(-0.01);

	getch();
	closegraph();
	return (0);
}
