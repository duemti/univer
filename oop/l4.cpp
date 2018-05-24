/**********************/
/* By. Petrov Dumitru */
/* Lab. 4             */
/**********************/

#include <vector>
#include <iostream>
#include <string>
using namespace std;

class Info
{
	protected:
		string	fname, lname, address, phone;
		int		age;
	public:
		virtual void print(void) = 0;
		
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
};

class Person:  public Info
{
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
		
		// Overloading
		bool operator==(Person& a) {
			if (a.get_fname() == this->get_fname()
				|| a.get_lname() == this->get_lname()
				|| a.get_address() == this->get_address()
				|| a.get_phone() == this->get_address()
				|| a.get_age() == this->get_age())
				return true;
			return false;
		}
		bool operator<<(ostream& os, Person& a) {
			return a.print();
		}
		bool operator>>(Person& a) {
			a.Person();
		}

		// Setters
		void set_address() {
			cout << "Address: ";
			while (address.empty())
				getline(cin, address);
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

		// Operators Overloading
		Person *operator[] (int i) {
			vector<Person*>::iterator iter;
			iter = persons.begin();
			int count = 0;

			while (iter != persons.end()) {
				if (i == count++)
					return (*iter);
				++iter;
			}
			return NULL;
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
