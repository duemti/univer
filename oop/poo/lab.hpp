#ifndef LAB_HPP
#define LAB_HPP

#include <iostream>
#include <string.h>
#include <string>
#include <stdio.h>
#include <stdlib.h>

using namespace std;

class Album
{
	public:
	static Album	*head;		// pointer la lista
	Album 			*next;		// pointer catre urmatorul element

	string			interpret;	// numele unui obiect din lista
	string			melodie;	// numele unei melodii din lista

	public:
		Album(int once);
		Album(string inter, string melo);	// declararea constructorului
		void	displayAll();		// afiseaza nodurile listei
		void	citireAlbum();		// citirea informatiilor despre album
		void	deleteAlbum();
		void	sortByMelody();
		void	editAlbum();
};

#endif
