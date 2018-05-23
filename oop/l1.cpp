/**********************/
/* By. Petrov Dumitru */
/* Lab. 1             */
/**********************/

#include <iostream>
#include <string.h>
using namespace std;

class Person
{
	private:
		string	fname, lname, address, phone;
		int		age;

	public:
		// Constructor
		Person ()
		{
			cout << "First Name: ";
			cin >> fname;
			cout << "Last Name: ";
			cin >> lname;
			cout << "Address: ";
			cin >> address;
			cout << "phone: ";
			cin >> phone;
			cout << "Age: ";
			cin >> age;
			cout << endl;
		}
		// Destructor
		~Person()
		{
			cout << "Deleted " << fname << endl;
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

int main()
{
	int option, person_count, person_id;

	cout << "How many persons to record? " << endl;
	cout << "> ";
	cin >> person_count;

	// allocating array of Person
	Person *persons[person_count];

	for (int i = 0; i < person_count; i++)
		persons[i] = new Person();



	while (1)
	{
		cout << "MENU" << endl;
		cout << "[1] Print" << endl;
		cout << "[2] Delete" << endl;
		cout << "[3] Search" << endl;
		cout << "[4] Exit" << endl;
		cout << "> ";
		cin >> option;

		switch (option) {
			case 1:
				for (int i = 0; i < person_count; i++)
				{
					cout << "----------> Person " << i+1 << endl;
					persons[i]->print();
					cout << endl;
				}
				break;
			case 2:
				cout << "Give person number: ";
				cin >> person_id;
				if (person_id > 0 && person_id <= person_count)
				{
					delete persons[person_id - 1];
					for (int i = 0; i < person_count; i++)
					{
						persons[i] = persons[i + 1];
					}
					person_count--;
				} else {
					cout << "No such person." << endl;
				}
				break;
			case 3:
				int opt, age, person_id;
				cout << "Search by: " << endl;
				cout << "[0] ID\n[1] First Name\n[2] Last Name\n[3] Address\n[4] Age\n[5] Phone Number" << endl;
				cin >> opt;
				cout << "query> ";
				switch (opt) {
					case 0:
					{
						string query;
						cin >> person_id;
						if (person_id > 0 && person_id <= person_count)
						{
							persons[person_id -1]->print();
						} else {
							cout << "No such person." << endl;
						}
						break;
					}
					case 1:
					{
						string query;
						cin >> query;
						for (int i = 0; i < person_count; i++) {
							if (query == persons[i]->get_fname()) {
								persons[i]->print();
								break;
							}
						}
						cout << "No such person." << endl;
						break;
					}
					case 2:
					{
						string query;
						cin >> query;
						for (int i = 0; i < person_count; i++) {
							if (query == persons[i]->get_lname()) {
								persons[i]->print();
								break;
							}
						}
						cout << "No such person." << endl;
						break;
					}
					case 3:
					{
						string query;
						cin >> query;
						for (int i = 0; i < person_count; i++) {
							if (query == persons[i]->get_address()) {
								persons[i]->print();
								break;
							}
						}
						cout << "No such person." << endl;
						break;
					}
					case 4:
						{
							int age;
							cin >> age;
							for (int i = 0; i < person_count; i++) {
								if (age == persons[i]->get_age()) {
									persons[i]->print();
									break;
								}
							}
							cout << "No such person." << endl;
							break;
						}
					case 5:
					{
						string query;
						cin >> query;
						for (int i = 0; i < person_count; i++) {
							if (query == persons[i]->get_phone()) {
								persons[i]->print();
								break;
							}
						}
						cout << "No such person." << endl;
						break;
					}
					default:
						cout << "Invalid option." << endl;
				}

				break;
			case 4:
				for (int i = 0; i < person_count; i++)
					delete persons[i];
				cout << "Bye." << endl;
				return 0;
				break;
			default:
				cout << "Invalid option." << endl;
		}
	}

	return (0);
}
