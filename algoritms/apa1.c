/**********************/
/* By. Petrov Dumitru */
/* APA Lab. 1         */
/**********************/

#include <stdio.h>
#include <time.h>

int fib1(int n)
{
	if (n < 2)
		return (n);
	else
		return (fib1(n-1) + fib1(n-2));
}

int fib2(int n)
{
	int i, j;

	i = 1;
	j = 0;
	for (int k = 1; k <= n; k++)
	{
		j = i + j;
		i = j - i;
	}
	return (j);
}

int fib3(int n)
{
	int i, j, k, h, t;

	i = 1;
	j = 0;
	k = 0;
	h = 1;
	n--;
	while (n > 0)
	{
		if (n % 2 != 0)
		{
			t = j * h;
			j = i*h + j*k + t;
			i = i*k + t;
		}
		t = h * h;
		h = 2*k*h + t;
		k = k*k + t;
		n = n / 2;
	}
	return (j);
}

int main()
{
	clock_t start, end;
	int n;

	while (1)
	{
		printf("give n> ");
		scanf("%d", &n);

		start = clock();
		fib1(n);
		end = clock();
		printf("\tTimp de Executie:\n\t\tfib1:%f secunde.\n", (double)(end - start) / CLOCKS_PER_SEC);

		start = clock();
		fib2(n);
		end = clock();
		printf("\t\tfib2:%f secunde.\n", (double)(end - start) / CLOCKS_PER_SEC);
		
		start = clock();
		fib3(n);
		end = clock();
		printf("\t\tfib3:%f secunde.\n", (double)(end - start) / CLOCKS_PER_SEC);
	}
	return (0);
}
