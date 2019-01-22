#include "lab.hpp"

Album *Album::head = NULL;

// Constructorul Clasei
Album::Album(string inter, string melo)
{

	interpret = inter;
	melodie = melo;
	next = NULL;
}


// Constructor executed once!
Album::Album(int once)
{
	head = this;
}

void	Album::sortByMelody()
{
	Album 	*prev, *curr, *next;
	string	cmel, nmel;

	curr = Album::head;
	prev = NULL;
	next = curr->next;
	while (next)
	{
		cmel = curr->melodie;
		nmel = next->melodie;

		if (cmel.compare(nmel) > 0) {
			if (prev)
				prev->next = next;
			else
				this->head = next;
			curr->next = next->next;
			next->next = curr;


			curr = this->head;
			next = curr->next;
			prev = NULL;
		} else {
			prev = curr;
			curr = next;
			next = next->next;
		}
	}
}

void	Album::citireAlbum()
{
	string	melo, inter;

	cout << "Enter interpreters name: ";
	getline(cin, inter);
	cout << "Enter melody name: ";
	getline(cin, melo);
	if (interpret.empty() && melodie.empty()) {
		interpret = inter;
		melodie = melo;
	} else {
		Album	*temp = Album::head;
		while (temp->next)
			temp = temp->next;
		temp->next = new Album(inter, melo);
	}
}

void	Album::displayAll()
{
	int		nr;
	Album	*t = Album::head;

	nr = 1;
	while (t) {
		cout << "\t" << (nr++) << ". Interpreter: " << (t->interpret) << "\tMelody: " << (t->melodie) << endl;
		t = t->next;
	}
}

void	Album::deleteAlbum()
{
	string	option;
	Album	*prev, *a = Album::head;
	int		opt;

	prev = a;
	cout << "Number of the album to delete: ";
	getline(cin, option);
	opt = atoi(option.c_str());
	while (--opt) {
		if (! a || ! a->next) {
			cout << "No such album." << endl;
			return ;
		}
		prev = a;
		a = a->next;
	}
	if (prev == a)
		head = a->next;
	prev->next = a->next;
	delete a;
}

void	Album::editAlbum()
{
	string	option;
	Album	*a = Album::head;
	int		opt;

	cout << "Number of the album to delete: ";
	getline(cin, option);
	opt = atoi(option.c_str());
	while (--opt) {
		if (! a || ! a->next) {
			cout << "No such album." << endl;
			return ;
		}
		a = a->next;
	}
	cout << "Edit the interpreter? (y/N): ";
	getline(cin, option);
	if (option == "y") {
		cout << "(" << a->interpret << "): ";
		getline(cin, option);
		a->interpret = option;
	}
	cout << "Edit the melody? (y/N): ";
	getline(cin, option);
	if (option == "y") {
		cout << "(" << a->melodie << "): ";
		getline(cin, option);
		a->melodie = option;
	}
}

