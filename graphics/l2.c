/**********************/
/* By. Dumitru Petrov */
/* Lab. 2 V21         */
/**********************/

#include <graphics.h>
#include <math.h>

#define R RED
#define S GREEN
#define TX 10
#define TY 120
#define RX 50
#define RY 50
#define ANGLE 30*M_PI/180
#define SCALE 1.25

int main()
{
	int gd = DETECT, gm, saveX;
	
	initgraph(&gd, &gm, NULL);
	int patrat[] = {200,100, 300,100, 300,200, 200,200, 200,100};
	setcolor(S);
	drawpoly(5, patrat);
	floodfill(250, 150, S);
	int points[]={500,100,570,200,450,200,500,100};
	setcolor(R);
	drawpoly(4, points);
	floodfill(500, 101, S);


	/* rotatia */
	outtextxy(RX, RY, "P");
	for (int i = 0; i < 10; i+=2) {
		saveX = patrat[i];
		patrat[i] = (patrat[i] - RX) * cos(ANGLE) - (patrat[i+1] - RY) * sin(ANGLE);
		patrat[i+1] = (saveX - RX) * sin(ANGLE) + (patrat[i+1] - RY) * cos(ANGLE);
	}

	/* scalarea */
	for (int i = 0; i < 10; i++) {
		patrat[i] = SCALE * patrat[i];
	}

	/* translataia 10, 120 */
	for (int i = 0; i < 10; i++) {
		if (i % 2) {
			patrat[i] += TY;
		}else{
			patrat[i] += TX;
		}
	}
	setcolor(R);
	drawpoly(5, patrat);
	floodfill(patrat[0], patrat[1]+1, R);
	
	getch();
	closegraph();
	return (0);
}
