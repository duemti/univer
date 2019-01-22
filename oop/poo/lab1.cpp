/*
**
**	By: PETROV Dumitru
**
*/

#include "lab.hpp"

void	display_menu()
{
	cout << "Menu:\n";
	cout << "\t[1] - Add Album.\n";
	cout << "\t[2] - Print all albums.\n";
	cout << "\t[3] - Edit album.\n";
	cout << "\t[4] - Sort by melody name.\n";
	cout << "\t[5] - Delete an album.\n";
	cout << "\t[6] - Exit.\n";
	cout << "> ";
}

int		execute_option(string option, Album *album)
{
	int	ret;

	ret = 0;
	if (option == "1")
		(*album).citireAlbum();
	else if (option == "2")
		(*album).displayAll();
	else if (option == "3")
		(*album).editAlbum();
	else if (option == "4")
		(*album).sortByMelody();
	else if (option == "5")
		(*album).deleteAlbum();
	else if (option == "6")
	{
		Album *del;

		while (Album::head)
		{
			del = Album::head;
			Album::head = del->next;
			delete del;
		}
		ret = 1;
	}
	else
		cout << "Not a valid option. try again!\n";
	return ret;
}

int		main()
{
	string option;
	Album *a = new Album(1);
	
	while (1)
	{
		display_menu();
		getline(cin, option);
		if (execute_option(option, a))
			break;
	}
	return 0;
}
