/**********************/
/* By. Petrov Dumitru */
/* Lab. 3             */
/**********************/

#include <vector>
#include <iostream>
#include <string>
using namespace std;

class Person
{
	private:
		string	fname, lname, address, phone;
		int		age;

	public:
		// Constructor
		Person (bool add)
		{
			if (!add) return;
			cout << "First Name: ";
			cin >> fname;
			cout << "Last Name: ";
			cin >> lname;
			set_address();
			cout << "phone: ";
			cin >> phone;
			cout << "Age: ";
			cin >> age;
			cout << endl;
		}
		// Destructor
		~Person()
		{
			delete &fname;
			delete &lname;
			delete &address;
			delete &phone;
			cout << "Deleted " << fname << endl;
		}

		// Setters
		void set_address() {
			cout << "Address: ";
			while (address.empty())
				getline(cin, address);
		}

		// Getters
		string get_fname() {
			return fname;
		}
		string get_lname() {
			return lname;
		}
		string get_address() {
			return address;
		}
		string get_phone() {
			return phone;
		}
		int get_age() {
			return age;
		}
		
		void print()
		{
			cout << "First Name: " << fname << endl;
			cout << "Last Name: " << lname  << endl;
			cout << "Address: " <<  address << endl;
			cout << "phone: " <<  phone  << endl;
			cout << "Age: " << age << endl;
		}
};

class Stiva: public Person
{
	private:
		vector <Person*> persons;
	public:
		// Constructor
		Stiva(): Person(false) {
			// empty intentionaly
		}


		// Methods
		void push() {
			persons.push_back(new Person(true));
		}
		void pop() {
			if (!persons.empty()) persons.pop_back();
		}
		void show() {
			vector<Person*>::iterator i;
			for (i = persons.begin(); i != persons.end(); ++i) {
				(*i)->print();
			}
		}
};

int main()
{
	int option;
	Stiva *stiva = new Stiva;

	while (1)
	{
		cout << "MENU" << endl;
		cout << "[1] Push" << endl;
		cout << "[2] Pop" << endl;
		cout << "[3] Show" << endl;
		cout << "> ";
		cin >> option;

		switch (option) {
			case 1:
				stiva->push();
				break;
			case 2:
				stiva->pop();
				break;
			case 3:
				stiva->show();
				break;
			default:
				cout << "Invalid option." << endl;
		}
	}

	return (0);
}
