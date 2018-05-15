/**********************/
/* By: Dumitru Petrov */
/* Lucrare nr. 1      */
/**********************/

#include <graphics.h>

int main()
{
	int	gd = DETECT, gm;

	initgraph(&gd, &gm, "");

	circle(250, 200, 50);
	closegraph();
	return (0);
}
