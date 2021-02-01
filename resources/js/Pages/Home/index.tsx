import React from "react";
import Layout from "../../components/common/layout";
import Expenses from "../../interface/Expense";

interface Props {
    expenses: Array<Expenses>;
}

const HomePage = (props: Props) => {

    const {expenses} = props;

    return <div>
        <Layout pageTitle="My Expenses">
            <ul>
                { expenses.map( (value: Expenses, index) => {
                    return <li key={index}>{value.description}</li>
                } ) }
            </ul>
        </Layout>
    </div>;

};

export default HomePage;